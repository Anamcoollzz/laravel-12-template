<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyLeaderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|string|regex:/^[\pL\s.,]+$/u|max:50',
            'faculty_id'   => 'required|numeric|exists:faculties,id',
            "birth_date"   => "required|date",
            'email'        => $this->isMethod('put') ? 'nullable|email|unique:users,email,' . $this->route('faculty_leader')->user->id : 'nullable|email|unique:users,email',
            'password'     => $this->isMethod('put') ? 'nullable|min:6' : 'required|min:6',
            'phone_number' => 'required|string|max:20',
            'address'      => 'required|string|max:191',
        ];
    }
}
