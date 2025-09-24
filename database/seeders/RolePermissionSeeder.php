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
        DB::enableQueryLog();
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        PermissionGroup::truncate();
        Permission::truncate();

        $roles = config('stisla.roles');
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

        // dd(DB::getQueryLog());
        // dd(DB::getQueryLog()[1859], DB::getQueryLog()[1858], DB::getQueryLog()[1857]);
    }

    private function generatePermission($permissions = false)
    {

        // default permissions
        $permissions = $permissions ? $permissions : config('stisla.permissions');
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
            if ($permission['name'] === 'Reset Sistem') {
                // dd($permission['roles']);
            }
            $perm = Permission::create([
                'name'                => $permission['name'],
                'permission_group_id' => $group->id
            ]);
            // foreach ($permission['roles'] as $role) {
            //     if (in_array($role, $this->rolesArray))
            //         $perm->assignRole($role);
            // }
            $perm->syncRoles($roles);
        }
    }

    private function perModule()
    {
        $files = File::allFiles(base_path('config'));
        foreach ($files as $file) {
            if (
                Str::contains($file->getFilename(), '-permission.php')
                // && !Str::contains($file->getFilename(), 'example-crud-permission.php')
            ) {
                $this->generatePermission(config(str_replace('.php', '', $file->getFilename())));
            }
        }
    }
}
