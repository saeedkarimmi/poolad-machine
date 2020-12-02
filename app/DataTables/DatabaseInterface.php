<?php


namespace App\DataTables;


use Spatie\Permission\Models\Role;

interface DatabaseInterface
{
    public function dataTable($query);

    public function query(Role $model);

    public function getColumns();

}
