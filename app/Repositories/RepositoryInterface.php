<?php


namespace App\Repositories;


use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function all();

    public function pluck($column1, $column2);

    public function create(Request $request);

    public function update(Request $request, $id);

    public function delete($id);

    public function show($id);
}
