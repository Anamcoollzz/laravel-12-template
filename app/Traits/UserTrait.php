<?php

namespace App\Traits;

use App\Models\User;

trait UserTrait
{
    /**
     * Get the user that created
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select(['id', 'name']);
    }

    /**
     * Get the user that updated
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by_id')->select(['id', 'name']);
    }

    /**
     * Get the user that created
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select(['id', 'name', 'email']);
    }

    /**
     * Get the user that updated
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'last_updated_by_id')->select(['id', 'name', 'email']);
    }

    /**
     * Get the user id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
