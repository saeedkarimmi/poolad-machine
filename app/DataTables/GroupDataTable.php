<?php

namespace App\DataTables;

use App\Models\Panel\Group;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GroupDataTable extends BaseDataTable implements DatabaseInterface
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
            ->addColumn('action', function ($row) {
                return sprintf('<a href="%s" title="%s"><i class="fa fa-edit text-navy"></i></a>',
                    route('panel.groups.edit', $row->id), __('general.form.edit'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Group $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Group $model)
    {
        return $model->newQuery();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex', 'DT_RowIndex')->title('#')->width(20)->searchable(false)->orderable(false),
            Column::make('name')->title(trans('role.form.name')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }

    protected function getBuilderParameters()
    {
        $params = parent::getBuilderParameters();
        array_unshift($params['buttons'], [
            'text' => 'ایجاد گروه کاربری جدید',
            'className' => 'action',
            'action' => 'function(e, dt, node, config) { var u = "' . route('panel.groups.create') . '"; window.location.href = u; }'
        ]);
        return $params;
    }
}
