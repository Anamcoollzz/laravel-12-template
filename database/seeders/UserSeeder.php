<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Repositories\RegionRepository;

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

        $users = config('stisla.users');
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
                'last_updated_by_id'   => null
            ]);
            foreach ($user['roles'] as $role)
                if (in_array($role, $rolesArray))
                    $userObj->assignRole($role);
        }

        $gs = new RegionRepository;
        $provinces = $gs->getProvinces();

        $password = bcrypt('12345');
        foreach (range(1, 50) as $index) {
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
                'is_anonymous'         => fake()->randomElement([0, 1]),
                'gender'               => fake()->randomElement([User::GENDER_MALE, User::GENDER_FEMALE]),
                'nik'                  => fake()->unique()->numerify('##################'),
                'uuid'                 => fake()->unique()->uuid(),
                'is_majalengka'        => fake()->randomElement([0, 1]),
                'province_code'        => $province = $provinces->random()->code,
                'city_code'            => $city = $gs->getCities($province)->random()->code,
                'district_code'        => $district = $gs->getDistricts($city)->random()->code,
                'village_code'         => $gs->getVillages($district)->random()->code,
            ]);
            $userObj->assignRole('user');
        }
    }
}
