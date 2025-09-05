<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        if (auth_user()->hasRole('mahasiswa')) {
            return [
                'name'             => 'required',
                'nim'              => 'nullable|numeric|exists:students,nim,user_id,' . auth_id(),
                "birth_date"       => "required|date",
                'study_program_id' => 'nullable|numeric|exists:study_programs,id',
                'class_year'       => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                'student_status'   => 'nullable|string|max:30',
                'email'            => $this->isMethod('put') ? 'nullable|email|unique:users,email,' . auth_id() : 'nullable|email|unique:users,email',
                'password'         => $this->isMethod('put') ? 'nullable|min:6' : 'required|min:6',
                'phone_number'     => 'nullable|string|max:20',
                'photo'            => $this->isMethod('put') ? 'nullable|image|max:512' : 'required|image|max:512',
            ];
        }
        return [
            'name'             => 'required',
            'nim'              => $this->isMethod('put') ? 'required|numeric|unique:students,nim,' . $this->route('student')->id : 'required|numeric|unique:students,nim',
            "birth_date"       => "required|date",
            'study_program_id' => 'required|numeric|exists:study_programs,id',
            'class_year'       => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'student_status'   => 'required|string|max:30',
            'email'            => $this->isMethod('put') ? 'nullable|email|unique:users,email,' . optional($this->route('student')->user)->id : 'nullable|email|unique:users,email',
            'password'         => $this->isMethod('put') ? 'nullable|min:6' : 'required|min:6',
            'phone_number'     => 'nullable|string|max:20',
            'photo'            => $this->isMethod('put') ? 'nullable|image|max:512' : 'required|image|max:512',
        ];
    }
}
