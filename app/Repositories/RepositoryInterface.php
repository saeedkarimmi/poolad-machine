<?php


namespace App\Repositories;


use App\Models\Panel\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $column1
     * @param $column2
     * @return mixed
     */
    public function pluck($column1, $column2);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param Model $model
     * @return mixed
     */
    public function update(array $data, Model $model);

    /**
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model);

    /**
     * @param Model $model
     * @return mixed
     */
    public function show(Model $model);

    /**
     * @param Model $model
     * @return mixed
     */
    public function find(Model $model);
}
