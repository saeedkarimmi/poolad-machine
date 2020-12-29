<?php

namespace Database\Seeders;

use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * @property RoleRepository role
 * @property PermissionRepository permission
 */
class RoleAndPermissionSeeder extends Seeder
{
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = new RoleRepository($role);
        $this->permission = new PermissionRepository($permission);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $otherPermissions = [
            ['name' => 'admin-login'],
            ['name' => 'manage-menu-items'],
        ];

        $crudPermissions = collect(collect(config('cruds.routes', [])))->transform(function($item){
            return [
                'name' => $item['permission'],
            ];
        })->all();


        $permissions = array_merge($crudPermissions, $otherPermissions);

        foreach ($permissions as $row) {
           $this->permission->updateOrCreate([
                'name' => $row['name'],
            ]);
        }

        $permissions = $this->permission->pluck('id')->toArray();

        $this->role->updateOrCreate([
            'name' => 'admin-role',
            'permissions' => $permissions
        ]);


        Cache::flush();
    }
}
