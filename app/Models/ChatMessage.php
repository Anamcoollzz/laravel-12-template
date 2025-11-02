<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'message',
    ];

    protected $table = 'chat_messages';

    protected $casts = [
        'message' => 'string',
    ];

    protected $appends = [
        // Add any accessors you want to append to the model's array form
        'time',
        'side',
        'avatar',
    ];

    public function getAvatarAttribute()
    {
        if ($this->side === 'right') {
            return url('stisla') . '/assets/img/avatar/avatar-1.png';
        }
        // Return a default avatar or implement logic to fetch user avatar
        return url('stisla') . '/assets/img/avatar/avatar-3.png';
    }

    public function getSideAttribute()
    {
        return $this->from_user_id === auth_user()->id ? 'right' : 'left';
    }

    public function getTimeAttribute()
    {
        return $this->created_at->format('H:i:s');
    }

    // Define relationships, accessors, or other model methods as needed
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
