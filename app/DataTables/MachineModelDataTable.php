<?php

namespace App\DataTables;

use App\Models\Panel\MachineModel;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MachineModelDataTable extends BaseDataTable implements DatabaseInterface
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
            ->editColumn('machine', function ($row){
                return $row->enName;
            })
            ->editColumn('machine_fa', function ($row){
                return $row->faName;
            })
            ->addColumn('action', function ($row) {
                return sprintf('<a href="%s" title="%s"><i class="fa fa-edit text-navy"></i></a>',
                    route('panel.machine_models.edit', $row->id), __('general.form.edit'));
            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param MachineModel $model
     * @return Builder
     */
    public function query(MachineModel $model)
    {
        return $model->newQuery();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getColumns()
    {
        return [
            Column::make('DT_RowIndex', 'DT_RowIndex')->title('#')->width(20)->searchable(false)->orderable(false),
            Column::computed('machine')->title(trans('validation.attributes.name')),
            Column::computed('machine_fa')->title(trans('validation.attributes.name')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }

    protected function getBuilderParameters()
    {
        $params = parent::getBuilderParameters();
        array_unshift($params['buttons'], [
            'text' => 'ایجاد مدل ماشین جدید',
            'className' => 'action',
            'action' => 'function(e, dt, node, config) { var u = "' . route('panel.machine_models.create') . '"; window.location.href = u; }'
        ]);
        return $params;
    }
}
