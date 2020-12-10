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
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => Hash::make($data['password']),
        ]);

        $user->syncRoles($data['roles']);

        return $user;
    }

    public function update(array $data, Model $model)
    {
        parent::update($data, $model);

        $model->syncRoles($data['roles']);

        return $model;
    }
}