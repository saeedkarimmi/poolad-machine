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
     * @param BaseModel $model
     * @return mixed
     */
    public function update(array $data, BaseModel $model);

    /**
     * @param BaseModel $model
     * @return mixed
     */
    public function delete(BaseModel $model);

    /**
     * @param BaseModel $model
     * @return mixed
     */
    public function show(BaseModel $model);

    public function find($id);
}
