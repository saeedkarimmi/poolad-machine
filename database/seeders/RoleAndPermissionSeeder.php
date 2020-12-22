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
        $permissions = [
            ['id' => '1','name' => 'admin-login', 'parent_id' => null],
            ['id' => '2','name' => 'manage-dashboard', 'parent_id' => 1],
            ['id' => '3','name' => 'manage-users'],
            ['id' => '4','name' => 'manage-menu-items'],
            ['id' => '5','name' => 'manage-users'],
            ['id' => '5','name' => 'manage-roles'],
        ];

        foreach ($permissions as $row) {
           $this->permission->updateOrCreate([
                'id' => $row['id'],
            ],[
                'name' => $row['name'],
                'parent_id' => ($row['parent_id'] ?? null)
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
