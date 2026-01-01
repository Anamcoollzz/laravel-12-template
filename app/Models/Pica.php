<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pica extends Model
{
    use HasFactory, UserTrait;

    //softdeletes


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picas';

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

        'notes',
        'function_id',
        'category_id',
        'work_field_id',
        'deadline',
        'kpi_related',
        'assigned_to',
        'created_date',
        'problem_identification',
        'corrective_action',
        'attachment',
        'evidence',
        'status_id',
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

    public function pocarifunction()
    {
        return $this->belongsTo(PocariFunction::class, 'function_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function workfield()
    {
        return $this->belongsTo(WorkField::class, 'work_field_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function assignedto()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
