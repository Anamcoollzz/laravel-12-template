<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "nim",
        "date_of_birth",
        "created_by_id",
        "last_updated_by_id",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the user that created the Student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    /**
     * Get the user that updated the Student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by_id');
    }
}
