<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Repositories\RegionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        if (is_app_dataku()) {
            $this->fromSql();
            return;
        }

        $roles = Role::all();
        $rolesArray = $roles->pluck('name')->toArray();

        User::truncate();

        $isRoleUsersExists = Role::whereIn('name', ['user'])->exists();

        $users = config('stisla.users');
        if (is_app_chat())
            $users = config('stisla-chat.users');
        foreach ($users as $user) {
            if (!isset($user['name'])) continue;
            $userObj = User::create([
                'name'                 => $user['name'],
                'email'                => $user['email'],
                'email_verified_at'    => $user['email_verified_at'],
                'password'             => bcrypt($user['password']),
                'is_locked'            => $user['is_locked'] ?? 0,
                'phone_number'         => $user['phone_number'] ?? null,
                'birth_date'           => $user['birth_date'] ?? null,
                'address'              => $user['address'] ?? null,
                'last_password_change' => date('Y-m-d H:i:s'),
                'created_by_id'        => 1,
                'last_updated_by_id'   => null,
                'uuid'                 => isset($user['uuid']) ? $user['uuid'] : Str::uuid()->toString(),
            ]);
            foreach ($user['roles'] as $role)
                if (in_array($role, $rolesArray))
                    $userObj->assignRole($role);
        }

        $isRegionsExists = Schema::hasTable('regions');
        if ($isRegionsExists) {
            $gs = new RegionRepository;
            $provinces = $gs->getProvinces();
        }

        $password = bcrypt('12345');
        if ($isRoleUsersExists)
            foreach (range(1, is_app_blank() ? 5 : 50) as $index) {
                $userObj = User::create([
                    'name'                 => $name = fake()->name(),
                    'email'                => fake()->unique()->safeEmail(),
                    'email_verified_at'    => fake()->optional()->dateTimeThisDecade()?->format('Y-m-d H:i:s'),
                    'password'             => $password,
                    'is_locked'            => $user['is_locked'] ?? 0,
                    'phone_number'         => fake('id_ID')->optional()->phoneNumber(),
                    'birth_date'           => fake()->optional()->date('Y-m-d'),
                    'address'              => fake()->address(),
                    'last_password_change' => date('Y-m-d H:i:s'),
                    'created_by_id'        => 1,
                    'last_updated_by_id'   => null,
                    'avatar'               => 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=128',
                    'photo'                => 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=128',
                    'is_anonymous'         => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                    'gender'               => fake()->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]),
                    'nik'                  => is_app_chat() ? fake()->unique()->numerify('##################') : null,
                    // 'uuid'                 => fake()->unique()->uuid(),
                    'is_majalengka'        => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                    'province_code'        => $isRegionsExists ? $province = $provinces?->random()?->code : null,
                    'city_code'            => $isRegionsExists ? $city = $gs->getCities($province)?->random()?->code : null,
                    'district_code'        => $isRegionsExists ? $district = $gs->getDistricts($city)?->random()?->code : null,
                    'village_code'         => $isRegionsExists ? $gs->getVillages($district)?->random()?->code : null,
                    'uuid'                 => Str::uuid()->toString(),
                ]);

                if ($isRoleUsersExists)
                    $userObj->assignRole('user');
            }

        if (is_app_dataku()) {
            $religions         = \App\Models\Religion::all();
            $schoolClasses     = \App\Models\SchoolClass::all();
            $works             = \App\Models\Work::all();
            $educationLevels   = \App\Models\EducationLevel::all();
            $classLevels       = \App\Models\ClassLevel::all();
            $schoolYears       = \App\Models\SchoolYear::all();
            $semesters         = \App\Models\Semester::all();
            $religionIds       = $religions->pluck('id')->toArray();
            $schoolClassIds    = $schoolClasses->pluck('id')->toArray();
            $workIds           = $works->pluck('id')->toArray();
            $educationLevelIds = $educationLevels->pluck('id')->toArray();
            $classLevelIds     = $classLevels->pluck('id')->toArray();
            $schoolYearIds     = $schoolYears->pluck('id')->toArray();
            $semesterIds       = $semesters->pluck('id')->toArray();

            foreach ($educationLevelIds as $educationLevelId) {
                foreach (range(1, 50) as $index) {
                    $userObj = User::create([
                        'name'                 => $name = fake()->name(),
                        // 'email'                => fake()->unique()->safeEmail(),
                        'email_verified_at'    => fake()->optional()->dateTimeThisDecade()?->format('Y-m-d H:i:s'),
                        'password'             => $password,
                        'is_locked'            => $user['is_locked'] ?? 0,
                        'phone_number'         => fake('id_ID')->optional()->phoneNumber(),
                        'birth_date'           => fake()->date('Y-m-d'),
                        'address'              => fake()->address(),
                        'last_password_change' => date('Y-m-d H:i:s'),
                        'created_by_id'        => 1,
                        'last_updated_by_id'   => null,
                        'avatar'               => 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=128',
                        'is_anonymous'         => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                        'gender'               => fake()->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]),
                        'nik'                  => fake()->unique()->numerify('##################'),
                        // 'uuid'                 => fake()->unique()->uuid(),
                        'is_majalengka'        => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                        'province_code'        => $isRegionsExists ? $province = $provinces?->random()?->code : null,
                        'city_code'            => $isRegionsExists ? $city = $gs->getCities($province)?->random()?->code : null,
                        'district_code'        => $isRegionsExists ? $district = $gs->getDistricts($city)?->random()?->code : null,
                        'village_code'         => $isRegionsExists ? $gs->getVillages($district)?->random()?->code : null,
                        'uuid'                 => Str::uuid()->toString(),

                        'nis'                 => fake()->unique()->numerify('##########'),
                        'nisn'                => fake()->unique()->numerify('##########'),
                        'religion_id'         => fake()->randomElement($religionIds),
                        'rt'                  => fake()->numerify('###'),
                        'rw'                  => fake()->numerify('###'),
                        'postal_code'         => fake()->numerify('#####'),
                        'school_class_id'     => fake()->randomElement($schoolClassIds),
                        'class_level_id'      => fake()->randomElement($classLevelIds),
                        'room'                => 'Room ' . fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
                        'father_nik'          => fake()->unique()->numerify('##################'),
                        'father_name'         => fake()->name('male'),
                        'father_birth_date'   => fake()->date('Y-m-d'),
                        'father_education'    => fake()->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor']),
                        'father_work_id'      => fake()->randomElement($workIds),
                        'father_income'       => fake()->randomElement([0, 1000000, 2500000, 5000000, 7500000, 10000000]),
                        'mother_nik'          => fake()->unique()->numerify('##################'),
                        'mother_name'         => fake()->name('female'),
                        'mother_birth_date'   => fake()->date('Y-m-d'),
                        'mother_education'    => fake()->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor']),
                        'mother_work_id'      => fake()->randomElement($workIds),
                        'mother_income'       => fake()->randomElement([0, 1000000, 2500000, 5000000, 7500000, 10000000]),
                        'guardian_nik'        => fake()->unique()->numerify('##################'),
                        'guardian_name'       => fake()->name(),
                        'guardian_birth_date' => fake()->date('Y-m-d'),
                        'guardian_education'  => fake()->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor']),
                        'guardian_work_id'    => fake()->randomElement($workIds),
                        'guardian_income'     => fake()->randomElement([0, 1000000, 2500000, 5000000, 7500000, 10000000]),
                        'education_level_id'  => $educationLevelId,
                        'school_year_id'      => fake()->randomElement($schoolYearIds),
                        'semester_id'         => fake()->randomElement($semesterIds),
                    ]);
                    $userObj->assignRole('siswa');
                }
            }

            foreach ($educationLevelIds as $educationLevelId) {
                foreach (range(1, 5) as $index) {
                    $userObj = User::create([
                        'name'                 => $name = fake()->name(),
                        'email'                => fake()->unique()->safeEmail(),
                        'email_verified_at'    => fake()->optional()->dateTimeThisDecade()?->format('Y-m-d H:i:s'),
                        'password'             => $password,
                        'is_locked'            => $user['is_locked'] ?? 0,
                        'phone_number'         => fake('id_ID')->optional()->phoneNumber(),
                        'birth_date'           => fake()->date('Y-m-d'),
                        'address'              => fake()->address(),
                        'last_password_change' => date('Y-m-d H:i:s'),
                        'created_by_id'        => 1,
                        'last_updated_by_id'   => null,
                        'avatar'               => 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=128',
                        'is_anonymous'         => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                        'gender'               => fake()->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]),
                        'nik'                  => fake()->unique()->numerify('##################'),
                        // 'uuid'                 => fake()->unique()->uuid(),
                        'is_majalengka'        => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                        'province_code'        => $isRegionsExists ? $province = $provinces?->random()?->code : null,
                        'city_code'            => $isRegionsExists ? $city = $gs->getCities($province)?->random()?->code : null,
                        'district_code'        => $isRegionsExists ? $district = $gs->getDistricts($city)?->random()?->code : null,
                        'village_code'         => $isRegionsExists ? $gs->getVillages($district)?->random()?->code : null,
                        'uuid'                 => Str::uuid()->toString(),

                        'teacher_nuptk'           => fake()->unique()->numerify('################'),
                        'teacher_mother_name'     => fake()->name('female'),
                        'teacher_employee_status' => fake()->randomElement(['PNS', 'Non-PNS']),
                        'teacher_gtk_type'        => fake()->randomElement(['Guru Kelas', 'Guru Mapel', 'Tenaga Kependidikan']),
                        'teacher_position'        => fake()->jobTitle(),
                        'education_level_id'      => $educationLevelId,

                    ]);

                    $userObj->assignRole('guru');
                }
            }

            foreach (range(1, 3) as $i)
                foreach ($educationLevelIds as $educationLevelId) {
                    $userObj = User::create([
                        'name'                 => $name = fake()->name(),
                        'email'                => fake()->unique()->safeEmail(),
                        'email_verified_at'    => fake()->optional()->dateTimeThisDecade()?->format('Y-m-d H:i:s'),
                        'password'             => $password,
                        'is_locked'            => $user['is_locked'] ?? 0,
                        'phone_number'         => fake('id_ID')->optional()->phoneNumber(),
                        'birth_date'           => fake()->date('Y-m-d'),
                        'address'              => fake()->address(),
                        'last_password_change' => date('Y-m-d H:i:s'),
                        'created_by_id'        => 1,
                        'last_updated_by_id'   => null,
                        'avatar'               => 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=128',
                        'is_anonymous'         => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                        'gender'               => fake()->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]),
                        'nik'                  => fake()->unique()->numerify('##################'),
                        // 'uuid'                 => fake()->unique()->uuid(),
                        'is_majalengka'        => is_app_chat() ? fake()->randomElement([0, 1]) : 0,
                        'province_code'        => $isRegionsExists ? $province = $provinces?->random()?->code : null,
                        'city_code'            => $isRegionsExists ? $city = $gs->getCities($province)?->random()?->code : null,
                        'district_code'        => $isRegionsExists ? $district = $gs->getDistricts($city)?->random()?->code : null,
                        'village_code'         => $isRegionsExists ? $gs->getVillages($district)?->random()?->code : null,
                        'uuid'                 => Str::uuid()->toString(),
                        'education_level_id'   => $educationLevelId,
                    ]);

                    $userObj->assignRole('kepala sekolah');
                }
        }
    }

    private function fromSql()
    {
        $query = file_get_contents(database_path('seeders/data/users.sql'));
        DB::unprepared($query);
    }
}
