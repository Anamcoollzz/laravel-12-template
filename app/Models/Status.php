<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, UserTrait;

    //softdeletes


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses';

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

        'name',
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

    public function picas()
    {
        return $this->hasMany(Pica::class, 'status_id', 'id');
    }

    const STATUS_OPEN = 1;
    const STATUS_ON_PROGRESS = 2;
    const STATUS_NEED_APPROVAL = 3;
    const STATUS_NEED_REVISION = 4;
    const STATUS_DONE = 5;
    const STATUS_OVERDUE = 6;

    const STATUS_NAMES = [
        self::STATUS_OPEN          => 'Open',
        self::STATUS_ON_PROGRESS   => 'On Progress',
        self::STATUS_OVERDUE       => 'Overdue',
        self::STATUS_NEED_APPROVAL => 'Need Approval',
        self::STATUS_NEED_REVISION => 'Need Revision',
        self::STATUS_DONE          => 'Done',
    ];

    public function getColorAttribute()
    {
        $id = $this->attributes['id'];
        $color = '#b71c2e';
        if ($id == self::STATUS_OPEN) {
            $type = 'secondary';
            $color = '#6c757d';
        } elseif ($id == self::STATUS_ON_PROGRESS) {
            $type = 'warning';
            $color = '#ff9800';
        } elseif ($id == self::STATUS_OVERDUE) {
            $type = 'danger';
            $color = '#dc3545';
        } elseif ($id == self::STATUS_NEED_APPROVAL) {
            $type = 'secondary';
            $color = 'purple';
        } elseif ($id == self::STATUS_NEED_REVISION) {
            $type = 'secondary';
            $color = '#f552eb';
        } elseif ($id == self::STATUS_DONE) {
            $type = 'secondary';
            $color = 'green';
        }
        return $color;
    }
}
