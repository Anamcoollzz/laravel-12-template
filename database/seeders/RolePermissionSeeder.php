<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    private $groupNames = [];
    private $groups = [];
    private $rolesArray = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_app_dataku())
            return;
        DB::enableQueryLog();
        Schema::disableForeignKeyConstraints();
        // dd(config('stisla.permission_excludes'));

        Role::truncate();
        PermissionGroup::truncate();
        Permission::truncate();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = config('stisla.roles');
        if (is_app_chat())
            $roles = config('stisla-chat.roles');
        $rolesData = [];
        foreach ($roles as $role) {
            // $roleObj = Role::create([
            //     'name' => $role,
            // ]);

            if ($role === 'superadmin') {
                $rolesData[] = [
                    'name'       => $role,
                    'guard_name' => 'web',
                    'is_locked'  => 1,
                ];
            } else {
                $rolesData[] = [
                    'name'       => $role,
                    'guard_name' => 'web',
                    'is_locked'  => 0,
                ];
            }
        }
        Role::insert($rolesData);

        $roles = Role::all();
        $this->rolesArray = $roles->pluck('name')->toArray();

        $this->generatePermission();
        $this->perModule();

        // per module generated permission
        $path = database_path('seeders/data/permission-modules');
        if (file_exists($path)) {
            $files = getFileNamesFromDir($path);
            foreach ($files as $file) {
                $permissions = json_decode(file_get_contents(database_path('seeders/data/permission-modules/' . $file)), true);
                foreach ($permissions as $permission) {
                    if (!in_array($permission['group'], $this->groupNames)) {
                        $this->groupNames[] = $permission['group'];
                        $group = PermissionGroup::create([
                            'group_name' => $permission['group']
                        ]);
                        $this->groups[$permission['group']] = $group;
                        $roles = $this->rolesArray[$permission['group']] = Role::whereIn('name', $permission['roles'])->get();
                    } else {
                        $group = $this->groups[$permission['group']];
                        $roles = $this->rolesArray[$permission['group']];
                    }

                    if (!in_array($permission['name'], config('stisla.permission_excludes'))) {
                        $perm = Permission::create([
                            'name'                => $permission['name'],
                            'permission_group_id' => $group->id
                        ]);
                        // foreach ($permission['roles'] as $role)
                        //     if (in_array($role, $this->rolesArray))
                        // $perm->assignRole($role);
                        $perm->syncRoles($roles);
                    }
                }
            }
        }

        // dd(DB::getQueryLog());
        // dd(DB::getQueryLog()[1859], DB::getQueryLog()[1858], DB::getQueryLog()[1857]);
    }

    /**
     * generate permission
     *
     * @param boolean $permissions
     * @return void
     */
    private function generatePermission($permissions = false)
    {

        // default permissions
        if (is_app_chat()) {
            $permissions = $permissions ? $permissions : config('stisla-chat.permissions');
        } else {
            $permissions = $permissions ? $permissions : config('stisla.permissions');
        }
        foreach ($permissions as $permission) {
            if (!in_array($permission['group'], $this->groupNames) && (!isset($permission['table']) || (isset($permission['table']) && Schema::hasTable($permission['table'])))) {
                $this->groupNames[] = $permission['group'];
                $group = PermissionGroup::create([
                    'group_name' => $permission['group']
                ]);
                $this->groups[$permission['group']] = $group;
                $roles = $this->rolesArray[$permission['group']] = Role::whereIn('name', $permission['roles'])->get();
            } else {
                $group = $this->groups[$permission['group']] ?? null;
                // $roles = $this->rolesArray[$permission['group']]??null;
            }
            if ($permission['name'] === 'Reset Sistem') {
                // dd($permission['roles']);
            }
            if (isset($permission['table'])) {
                if (Schema::hasTable($permission['table'])) {
                    $perm = Permission::create([
                        'name'                => $name = $permission['name'],
                        'permission_group_id' => $group->id
                    ]);
                    // foreach ($permission['roles'] as $role) {
                    //     if (in_array($role, $this->rolesArray))
                    //         $perm->assignRole($role);
                    // }
                    // if ($name === 'Profil Hapus Akun') {
                    //     dd($permission['roles'], $roles->toArray());
                    // }
                    $roles = Role::whereIn('name', $permission['roles'])->get();
                    $perm->syncRoles($roles);
                }
            } else {
                try {
                    if (!in_array($permission['name'], config('stisla.permission_excludes'))) {
                        $perm = Permission::create([
                            'name'                => $name = $permission['name'],
                            'permission_group_id' => $group->id
                        ]);
                        $roles = Role::whereIn('name', $permission['roles'])->get();
                        $perm->syncRoles($roles);
                    }
                } catch (\Exception $e) {
                    $permissions = Permission::all();
                    dd($e->getMessage(), $permissions);
                }
            }
        }
    }

    /**
     * per module permission
     *
     * @return void
     */
    private function perModule()
    {
        if (is_app_chat())
            return;
        $files = File::allFiles(base_path('config'));
        foreach ($files as $file) {
            if (
                Str::contains($file->getFilename(), '-permission.php')
                // && !Str::contains($file->getFilename(), 'crud-example-permission.php')
            ) {
                $this->generatePermission(config(str_replace('.php', '', $file->getFilename())));
            }
        }
    }
}
