<?php


namespace App\Repositories;


use App\Models\Panel\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $column
     * @param null $key
     * @return mixed
     */
    public function pluck($column, $key = null);

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
     * Get the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     */
    public function updateOrCreate(array $attributes, array $values = []);

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
