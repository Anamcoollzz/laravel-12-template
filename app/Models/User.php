<?php

namespace App\Models;

use App\Helpers\StringHelper;
use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'email_verified_at',
        'password',
        'last_login',
        'email_token',
        'verification_code',
        'is_locked',
        'phone_number',
        'birth_date',
        'address',
        'last_password_change',
        'twitter_id',
        'file_upload',
        'wrong_login',
        'is_active',
        'created_by_id',
        'last_updated_by_id',
        'blocked_reason',
        'deleted_at',
        'deleted_by_id',
        'last_seen_at',
        'is_anonymous',
        'gender',
        'nik',
        'uuid',
    ];

    const GENDER_MALE = 'Laki-laki';
    const GENDER_FEMALE = 'Perempuan';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_seen_at'      => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
        'is_online',
    ];

    /**
     * Scope a query to only include users of a given age range.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAge1018()
    {
        return $this->whereBetween('birth_date', [now()->subYears(18), now()->subYears(10)]);
    }

    /**
     * Scope a query to only include users of a given age range.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAge1925()
    {
        return $this->whereBetween('birth_date', [now()->subYears(25), now()->subYears(18)]);
    }

    /**
     * Scope a query to only include users of a given age range.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAge2650()
    {
        return $this->whereBetween('birth_date', [now()->subYears(50), now()->subYears(25)]);
    }

    /**
     * Scope a query to only include users of a given age range.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAge511000()
    {
        return $this->whereBetween('birth_date', [now()->subYears(1000), now()->subYears(51)]);
    }

    /**
     * add custom column name to hide real name if is_anonymous is true
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        if ($this->is_anonymous) {
            return 'Anonymous';
        }
        return $value;
    }

    /**
     * add custom column is online
     *
     * @return bool
     */
    public function getIsOnlineAttribute(): bool
    {
        return $this->last_seen_at ? $this->last_seen_at->isAfter(now()->subMinutes(5)) : false;
    }

    /**
     * add custom column avatar url
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            if (StringHelper::isUrl($this->avatar)) {
                return $this->avatar;
            }
            if (Storage::exists('public/avatars/' . $this->avatar)) {
                return asset('storage/avatars/' . $this->avatar);
            }
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=random&size=128';
        return null;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the user that deleted the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by_id');
    }

    /**
     * Get the faculty leader associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facultyLeader()
    {
        return $this->hasOne(FacultyLeader::class);
    }

    /**
     * Get the student associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
