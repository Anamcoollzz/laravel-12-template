<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

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
        "created_by_id",
        "last_updated_by_id",


        'name',
        'faculty_id',
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

    /**
     * Get the user that created the StudyProgram.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    /**
     * Get the user that updated the StudyProgram.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by_id');
    }

    /**
     * Get the faculty that owns the StudyProgram.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Get the students associated with the StudyProgram.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
