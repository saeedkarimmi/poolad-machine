<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Prophecy\Doubler\Generator\TypeHintReference;
use Spatie\Permission\Models\Role;

/**
 * @property RoleRepository role
 * @property UserRepository user
 */
class AdminSeeder extends Seeder
{
    public function __construct(User $user, Role $role)
    {
        $this->role = new RoleRepository($role);
        $this->user = new UserRepository($user);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->role->pluck('id')->toArray();

        $this->user->updateOrCreate([
            'email' => 'admin@local.dev',
        ],[
            'name'      => 'admin',
            'password'  => Hash::make(123456789)
        ],
            $roles
        );
    }
}
