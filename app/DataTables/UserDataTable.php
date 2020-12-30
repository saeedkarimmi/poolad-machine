<?php

namespace App\DataTables;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends BaseDataTable implements DatabaseInterface
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('action', function ($row){
                return sprintf('<a href="%s" title="%s"><i class="fa fa-edit text-navy"></i></a>',
                    route('panel.users.edit', $row->id),__('general.form.edit'));
            })->editColumn('active', function ($row){
                return $row->isActive() ? __('validation.attributes.active') : __('validation.attributes.inactive');
            });
    }

    /**
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex', 'DT_RowIndex')->title('#')->width(20)->searchable(false)->orderable(false),
            Column::make('name')->title(trans('validation.attributes.name')),
            Column::make('last_name')->title(trans('validation.attributes.last_name')),
            Column::make('email')->title(trans('validation.attributes.email')),
            Column::make('active')->title(trans('validation.attributes.active')),
            Column::make('jalali_created_at', 'created_at')->title(trans('validation.attributes.created_at')),
            Column::make('jalali_updated_at', 'updated_at')->title(trans('validation.attributes.updated_at')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }

    protected function getBuilderParameters()
    {
        $params =  parent::getBuilderParameters();
        array_unshift($params['buttons'], [
            'text' => 'ایجاد کاربر جدید',
            'className' => 'action',
            'action' => 'function(e, dt, node, config) { var u = "' . route('panel.users.create') . '"; window.location.href = u; }'
        ]);
        return $params;
    }
}
