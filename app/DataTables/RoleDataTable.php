<?php

namespace App\DataTables;

use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends BaseDataTable implements DatabaseInterface
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                return sprintf('
                    <div class="dropdown">
                        <a class="btn btn-primary" href="%s" title=""><i class="fal fa-edit"></i> ویرایش</a>
                    </div>
                ', route('panel.roles.edit' , ['role' => $row->id]), $row->id, 'ویرایش');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery()->orderBy('id');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getColumns()
    {
        return [
            Column::make('DT_RowIndex', 'DT_RowIndex')->title('#')->width(20)->searchable(false),
            Column::make('name')->title(trans('role.form.name')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
            ];
    }

    protected function getBuilderParameters()
    {
        $params =  parent::getBuilderParameters();
        array_unshift($params['buttons'], [
            'text' => 'ایجاد نقش کاربری جدید',
            'className' => '',
            'action' => 'function(e, dt, node, config) { var u = "' . route('panel.roles.create') . '"; window.location.href = u; }'
        ]);
        return $params;
    }
}
