<?php

/**
 * Created by Saaed Km2.
 * Date: 01/12/2020
 * Time: 03:34 PM
 */


namespace App\Repositories;


use App\Models\Panel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Repository implements RepositoryInterface
{

    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->setModel($model);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param $column1
     * @param $column2
     * @return mixed
     */
    public function pluck($column1,$column2)
    {
        return $this->model->query()->pluck($column1,$column2);
    }

    /**
     * @param array $data
     * @return mixed
     * create a new record in the database
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param BaseModel $model
     * @return mixed
     * update record in the database
     */
    public function update(array $data, Model $model)
    {
        return $model->update($data);
    }

    /**
     * @param Model $model
     * @return mixed
     * remove record from the database
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * @param Model $model
     * @return mixed
     * show the record with the given id
     */
    public function show(Model $model)
    {
        return $model;
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel(Model $model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
