<?php


namespace App\Repositories;


use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function all();

    public function create(Request $request);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
}
