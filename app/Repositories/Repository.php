<?php

/**
 * Created by Saaed Km2.
 * Date: 01/12/2020
 * Time: 03:34 PM
 */


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Repository implements RepositoryInterface
{

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }


    public function pluck($column1,$column2)
    {
//        dd($this->model->query());
        return $this->model->query()->pluck($column1,$column2);
    }

    // create a new record in the database
    public function create(Request $request)
    {
        return $this->model->create($request->only($this->model->getFillable()));
    }

    // update record in the database
    public function update(Request $request, $id)
    {
        $record = $this->find($id);
        return $record->update($request->only($this->model->getFillable()));
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->find($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    private function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
