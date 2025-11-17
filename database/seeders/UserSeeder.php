<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Repositories\RegionRepository;
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

        $roles = Role::all();
        $rolesArray = $roles->pluck('name')->toArray();

        User::truncate();

        $isRoleUsersExists = Role::whereIn('name', ['user'])->exists();

        $users = config('stisla.users');
        if (is_app_chat())
            $users = config('stisla-chat.users');
        foreach ($users as $user) {
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
    }
}
