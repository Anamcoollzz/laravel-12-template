<?php

namespace App\Http\Requests;

use App\Enums\AppEnum;
use App\Models\User;
use App\Repositories\SettingRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Route::is('siaga-desa.register')) {
            return true;
        }
        return (new SettingRepository)->isActiveRegisterPage();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->all());
        if (Route::is('api.register')) {
            return [
                'name'                  => 'required',
                'email'                 => 'required|email|unique:users,email',
                'password'              => 'required|min:4|confirmed',
                'password_confirmation' => 'required|min:4',
                'phone_number'          => 'nullable|numeric',
            ];
        }

        if (Route::is('siaga-desa.register')) {
            return [
                'full_name'                      => 'required',
                'phone_number_register'          => 'required|numeric|unique:users,phone_number',
                'dusun_rt_rw'                    => 'required',
                'password_register'              => 'required|min:4',
            ];
        }

        $isGoogleCaptcha = SettingRepository::isGoogleCaptchaRegister();
        $isChat = config('stisla.app') === AppEnum::APP_CHAT;

        return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
            'g-recaptcha-response'  => $isGoogleCaptcha ? 'required|captcha' : 'nullable',
            'phone_number'          => 'nullable|numeric',
            'nik'                   => $isChat ? 'required|numeric|unique:users,nik' : 'nullable|numeric|unique:users,nik',
            'birth_date'            => $isChat ? 'required|date' : 'nullable|date',
            'gender'                => $isChat ? 'required|in:' . User::GENDER_MALE . ',' . User::GENDER_FEMALE : 'nullable|in:' . User::GENDER_MALE . ',' . User::GENDER_FEMALE,
            'nik' => $isChat ? [
                'required',
                'digits:16',
                'unique:users,nik',
                // hindari semua digit sama (000... / 111... / dst)
                function ($attr, $value, $fail) {
                    if (preg_match('/^(\d)\1{15}$/', $value)) {
                        $fail('NIK tidak valid.');
                    }
                },
                // validasi pola tanggal lahir di NIK (DDMMYY di digit 7-12; +40 utk perempuan)
                // function ($attr, $v, $fail) {
                //     $dd = (int) substr($v, 6, 2);
                //     $mm = (int) substr($v, 8, 2);
                //     $yy = (int) substr($v, 10, 2);
                //     // untuk perempuan, hari = 41–71 (kurangi 40)
                //     if ($dd >= 41) $dd -= 40;
                //     if (!checkdate($mm, $dd, 2000 + $yy) && !checkdate($mm, $dd, 1900 + $yy)) {
                //         $fail('Tanggal lahir pada NIK tidak valid.');
                //     }
                // },
            ] : [
                'nullable',
                'digits:16',
                'unique:users,nik',
            ],
        ];
    }
}
