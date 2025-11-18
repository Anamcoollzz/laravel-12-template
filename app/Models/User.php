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
        'is_majalengka',
        'province_code',
        'city_code',
        'district_code',
        'village_code',

        // student
        'nis',
        'nisn',
        'religion_id',
        'religion_id',
        'rt',
        'rw',
        'postal_code',
        'school_class_id',
        'school_class_id',
        'room',
        'father_nik',
        'father_name',
        'father_birth_date',
        'father_education',
        'father_work_id',
        'father_work_id',
        'father_income',
        'mother_nik',
        'mother_name',
        'mother_birth_date',
        'mother_education',
        'mother_work_id',
        'mother_work_id',
        'mother_income',
        'guardian_nik',
        'guardian_name',
        'guardian_birth_date',
        'guardian_education',
        'guardian_work_id',
        'guardian_work_id',
        'guardian_income',
        'class_level_id',

        // teacher
        'teacher_nuptk',
        'teacher_mother_name',
        'teacher_employee_status',
        'teacher_gtk_type',
        'teacher_position',

        'education_level_id',
    ];

    const GENDER_MALE   = 'Laki-laki';
    const GENDER_FEMALE = 'Perempuan';
    const GENDER_OTHER  = 'Tidak Mau Menyebutkan';

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
        'age',
    ];

    /**
     * Get the user's age.
     *
     * @return int|null
     */
    public function getAgeAttribute(): int|null
    {
        return $this->birth_date ? (new \Carbon\Carbon($this->birth_date))->age : null;
    }

    /**
     * Scope a query to only include female users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsFemale($query)
    {
        return $query->where('gender', self::GENDER_FEMALE);
    }

    /**
     * Scope a query to only include male users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsMale($query)
    {
        return $query->where('gender', self::GENDER_MALE);
    }

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

    /**
     * Scope a query to only include Majalengka residents.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMajalengkaResidents($query)
    {
        return $query->where('is_majalengka', true);
    }

    /**
     * Scope a query to only include non-Majalengka residents.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNonMajalengkaResidents($query)
    {
        return $query->where('is_majalengka', false);
    }

    /**
     * Get the region associated with the User's province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'province_code', 'code');
    }

    /**
     * Get the region associated with the User's province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Region::class, 'province_code', 'code');
    }

    /**
     * Get the region associated with the User's city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(Region::class, 'city_code', 'code');
    }

    /**
     * Get the region associated with the User's district.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(Region::class, 'district_code', 'code');
    }

    /**
     * Get the region associated with the User's village.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village()
    {
        return $this->belongsTo(Region::class, 'village_code', 'code');
    }

    /**
     * Get the religion associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    /**
     * Get the school class associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schoolclass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    /**
     * Get the father's work associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fatherwork()
    {
        return $this->belongsTo(Work::class, 'father_work_id');
    }

    /**
     * Get the mother's work associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motherwork()
    {
        return $this->belongsTo(Work::class, 'mother_work_id');
    }

    /**
     * Get the guardian's work associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guardianwork()
    {
        return $this->belongsTo(Work::class, 'guardian_work_id');
    }

    /**
     * Get the education level associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function educationlevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    /**
     * Get the class level associated with the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classlevel()
    {
        return $this->belongsTo(ClassLevel::class, 'class_level_id');
    }
}
