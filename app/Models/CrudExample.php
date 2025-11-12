<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudExample extends Model
{
    use HasFactory, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "text",
        "email",
        "number",
        "currency",
        "currency_idr",
        "select",
        "select2",
        "select2_multiple",
        "textarea",
        "radio",
        "checkbox",
        "checkbox2",
        "tags",
        "file",
        "image",
        "date",
        "time",
        "color",
        "summernote_simple",
        "summernote",
        "barcode",
        "qr_code",
        'name',
        'phone_number',
        'birthdate',
        'address',
        'avatar',
        'password',

        //columns
        "created_by_id",
        "last_updated_by_id",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'checkbox'         => 'array',
        'checkbox2'        => 'array',
        'select2_multiple' => 'array',
    ];
}
