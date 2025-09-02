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
        return [
            'name'              => 'required',
            'nim'               => $this->isMethod('put') ? 'required|numeric|unique:students,nim,' . $this->route('student')->id : 'required|numeric|unique:students,nim',
            "date_of_birth"     => "required|date",
            'study_program_id'  => 'required|numeric|exists:study_programs,id',
            // "currency"          => "required",
            // "currency_idr"      => "required",
            // "select"            => "required",
            // "select2"           => "required",
            // "select2_multiple"  => "required|array",
            // "textarea"          => "required",
            // "checkbox"          => "required|array",
            // "checkbox2"         => "required|array",
            // "radio"             => "required",
            // "file"              => $this->isMethod('put') ? 'nullable|file' : "required|file",
            // "image"             => $this->isMethod('put') ? 'nullable|image' : "required|image",
            // "date"              => "required|date",
            // "time"              => "required",
            // "color"             => "required",
            // "summernote_simple" => "required",
            // "summernote"        => "required",
            // "barcode"           => "required",
            // "qr_code"           => "required",
        ];
    }
}
