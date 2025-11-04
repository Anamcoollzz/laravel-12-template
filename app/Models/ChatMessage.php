<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ChatMessage extends Model
{
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'message',
        'category',
        'file_path',
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
        'is_left',
        'file_url',
    ];

    public function getFileUrlAttribute()
    {
        if ($this->file_path) {
            return url(Storage::url($this->file_path));
        }
        return null;
    }

    public function getIsLeftAttribute()
    {
        return $this->from_user_id !== auth_user()->id;
    }

    public function getAvatarAttribute()
    {
        if ($this->side === 'right') {
            return auth_user()->avatar_url;
            if ($this->fromUser && $this->fromUser->avatar_url) {
                return $this->fromUser->avatar_url;
            }
            return url('stisla') . '/assets/img/avatar/avatar-1.png';
        }
        if ($this->toUser && $this->toUser->avatar_url) {
            // dd($this->toUser->avatar_url);
            return $this->toUser->avatar_url;
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
        if ($this->created_at->format('Y-m-d') !== now()->format('Y-m-d')) {
            return $this->created_at->format('d M Y H:i:s');
        }
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

    const CATEGORY_CURHAT = 'curhat';
    const CATEGORY_KELUHAN_PENYAKIT = 'keluhan-penyakit';
    const CATEGORY_PERTANYAAN_LAINNYA = 'pertanyaan-lainnya';
}
