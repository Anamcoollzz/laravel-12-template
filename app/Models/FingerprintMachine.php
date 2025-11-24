<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FingerprintMachine extends Model
{
    use HasFactory, UserTrait;

    //softdeletes


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fingerprint_machines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // ini bisa dicomment kalau gak dipakai
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
        'tinymce',
        'ckeditor',
        'is_active',



        // ini hasil generate dari create:module command

        'machine_name',
        'ip',
        'key',
        'machine_id',
        'fn',
        "created_by_id",
        "last_updated_by_id",
        'deleted_at',
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
