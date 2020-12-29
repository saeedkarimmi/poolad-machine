<?php

/**
 * Created by Saeed Km2.
 * Date: 01/12/2020
 * Time: 09:50 AM
 */


namespace App\Repositories;


use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Panel\MenuItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleRepository extends Repository implements RepositoryInterface
{
    public function create(array $data)
    {
        /** @var Role $role */
        $role = parent::create($data);

        $role->givePermissionTo($data['permissions']);
        return $role;
    }

    /**
     * @param array $data
     * @param Model $model
     */
    public function update(array $data,Model $model)
    {
        /** @var Role $model */
        $model->syncPermissions($data['permissions']);
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        $role = parent::updateOrCreate(['name' => $attributes['name']]);

        $role->syncPermissions($attributes['permissions']);

        return $role;
    }
}
