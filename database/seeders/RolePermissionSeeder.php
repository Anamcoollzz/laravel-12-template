<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        Permission::truncate();

        $roles = config('stisla.roles');
        foreach ($roles as $role) {
            $roleObj = Role::create([
                'name' => $role,
            ]);
            if ($role === 'superadmin') {
                $roleObj->is_locked = 1;
            }
            $roleObj->created_by_id = 1;
            $roleObj->save();
        }
        $this->generatePermission();
        $this->perModule();

        // per module generated permission
        $path = database_path('seeders/data/permission-modules');
        if (file_exists($path)) {
            $files = getFileNamesFromDir($path);
            foreach ($files as $file) {
                $permissions = json_decode(file_get_contents(database_path('seeders/data/permission-modules/' . $file)), true);
                foreach ($permissions as $permission) {
                    $group = PermissionGroup::updateOrCreate([
                        'group_name' => $permission['group']
                    ]);
                    $perm = Permission::create([
                        'name'                => $permission['name'],
                        'permission_group_id' => $group->id
                    ]);
                    foreach ($permission['roles'] as $role)
                        if (in_array($role, $rolesArray))
                            $perm->assignRole($role);
                }
            }
        }
    }

    private function generatePermission($permissions = false)
    {
        $roles = Role::all();
        $rolesArray = $roles->pluck('name')->toArray();

        // default permissions
        $permissions = $permissions ? $permissions : config('stisla.permissions');
        foreach ($permissions as $permission) {
            $group = PermissionGroup::updateOrCreate([
                'group_name' => $permission['group']
            ]);
            if ($permission['name'] === 'Reset Sistem') {
                // dd($permission['roles']);
            }
            $perm = Permission::create([
                'name'                => $permission['name'],
                'permission_group_id' => $group->id
            ]);
            foreach ($permission['roles'] as $role) {
                if (in_array($role, $rolesArray))
                    $perm->assignRole($role);
            }
        }
    }

    private function perModule()
    {
        $files = File::allFiles(base_path('config'));
        foreach ($files as $file) {
            if (Str::contains($file->getFilename(), '-permission.php') && !Str::contains($file->getFilename(), 'example-crud-permission.php')) {
                $this->generatePermission(config(str_replace('.php', '', $file->getFilename())));
            }
        }
    }
}
