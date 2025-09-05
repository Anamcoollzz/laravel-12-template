<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * showing profil page
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        $totalDay = \Carbon\Carbon::parse($user->last_password_change)->diffInDays(now());

        return view('stisla.profile.index', [
            'user'     => $user,
            'd'        => $user,
            'totalDay' => $totalDay,
        ]);
    }

    /**
     * update profile user login
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function update(ProfileRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'phone_number',
            'birth_date',
            'address',
        ]);
        $user = Auth::user();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->fileService->uploadAvatar($request->file('avatar'));
        }
        $data['last_updated_by_id'] = auth_id();
        $newUser = $this->userRepository->updateProfile($data);

        logUpdate('Profil Pengguna', $user, $newUser);
        return backSuccess('Berhasil memperbarui profil');
    }

    /**
     * update password user login
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function updatePassword(ProfileRequest $request)
    {
        $oldPassword = Auth::user()->password;
        $data = [
            'password'             => $newPassword = bcrypt($request->new_password),
            'last_password_change' => date('Y-m-d H:i:s'),
            'last_updated_by_id'   => auth_id(),
        ];
        $this->userRepository->updateProfile($data);

        logUpdate('Kata Sandi', $oldPassword, $newPassword);
        return backSuccess('Berhasil memperbarui password');
    }

    /**
     * update email user login
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function updateEmail(ProfileRequest $request)
    {
        $this->userRepository->updateProfile([
            'email' => $request->email
        ]);

        logUpdate('Email', user_email(), $request->email);
        return backSuccess('Berhasil memperbarui email');
    }

    /**
     * delete account
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function deleteAccount(ProfileRequest $request)
    {
        $user = $this->userRepository->softDelete(auth_id());

        logDelete('Akun', $user);
        Auth::logout();
        return redirectSuccess(route('login'), 'Berhasil menghapus akun');
    }
}
