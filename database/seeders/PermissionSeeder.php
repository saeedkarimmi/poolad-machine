<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
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
        ];

        foreach ($permissions as $row) {
            Permission::query()->updateOrCreate([
                'id' => $row['id'],
            ],[
                'name' => $row['name'],
                'parent_id' => ($row['parent_id'] ?? null)
            ]);
        }

        Cache::flush();
    }
}
