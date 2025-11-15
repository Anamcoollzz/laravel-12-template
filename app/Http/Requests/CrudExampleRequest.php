<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrudExampleRequest extends FormRequest
{
    /**
     * @var bool|null
     */
    private $isMethodPut;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct(?bool $isMethodPut = false)
    {
        parent::__construct();
        $this->isMethodPut = $isMethodPut;
    }

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
     * @param bool $isMethodPut
     * @return array
     */
    public function rules(?bool $isMethodPut = false)
    {
        // dd($this);
        return [
            'text'              => 'required',
            'email'             => 'required|email',
            "number"            => "required|numeric",
            "currency"          => "required",
            "currency_idr"      => "required",
            "select"            => "required",
            "select2"           => "required",
            "select2_multiple"  => "required|array",
            "textarea"          => "required",
            "checkbox"          => "required|array",
            "checkbox2"         => "required|array",
            "radio"             => "required",
            "file"              => $this->isMethod('put') || $this->isMethodPut || $isMethodPut ? 'nullable|file' : "required|file",
            "image"             => $this->isMethod('put') || $this->isMethodPut || $isMethodPut ? 'nullable|image' : "required|image",
            "date"              => "required|date",
            "time"              => "required",
            "color"             => "required",
            "summernote_simple" => "required",
            "summernote"        => "required",
            "barcode"           => "required",
            "qr_code"           => "required",
            'name'              => 'required|string|regex:/^[\pL\s.,]+$/u|max:50',
            'phone_number'      => 'required',
            'birthdate'         => 'required|date',
            'address'           => 'required',
            'password'          => $this->isMethod('put') || $this->isMethodPut || $isMethodPut ? 'nullable|min:6' : 'required|min:6',
            'avatar'            => $this->isMethod('put') || $this->isMethodPut || $isMethodPut ? 'nullable|image' : 'required|image',
            // 'nik' => 'required|string|max:16',

            // columns
        ];
    }
}
