<?php

/**
 * Created by Saaed Km2.
 * Date: 01/12/2020
 * Time: 09:50 AM
 */


namespace App\Repositories;


use App\Models\Panel\MenuItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository implements RepositoryInterface
{
    public function create(array $data)
    {
        /** @var User $user */
        $user = $this->model->create([
            "name"      => $data['name'],
            "last_name" => $data['last_name'],
            "active"    => $data['status'],
            "email"     => $data['email'],
            "password"  => Hash::make($data['password']),
        ]);

        $user->syncRoles($data['roles']);

        return $user;
    }

    public function update(array $data, Model $model)
    {
        $model->update([
            "name"      => $data['name'],
            "last_name" => $data['last_name'],
            "active"    => $data['status'],
            "email"     => $data['email'],
        ]);

        $model->syncRoles($data['roles']);

        return $model;
    }

    /**
     * @param array $attributes
     * @param array $values
     * @param array|null $roles
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [], array $roles = null)
    {
        /** @var User $user */
        $user = $this->model->updateOrCreate($attributes, $values);

        if ($roles){
            $user->syncRoles($roles);
        }

        return $user;
    }
}
