<?php

/**
 * Created by Saaed Km2.
 * Date: 01/12/2020
 * Time: 09:50 AM
 */


namespace App\Repositories;


use App\Models\Panel\MenuItem;
use Illuminate\Http\Request;

class RoleRepository extends Repository implements MenuItemRepositoryInterface
{
    // create a new record in the database
    public function create(Request $request)
    {
        return $this->model->create($request->only(['name']));
    }
}
