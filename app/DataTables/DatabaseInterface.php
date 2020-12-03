<?php


namespace App\DataTables;


use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

interface DatabaseInterface
{
    public function dataTable($query);

    public function getColumns();

}
