<?php

namespace App\Http\Requests;

use App\Enums\AppEnum;
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
            'gender'                => $isChat ? 'required|in:Laki-laki,Perempuan' : 'nullable|in:Laki-laki,Perempuan',
        ];
    }
}
