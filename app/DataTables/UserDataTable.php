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
                return sprintf('
                    <div class="dropdown">
                        <a class="btn btn-primary" href="%s" title=""><i class="fal fa-edit"></i> ویرایش</a>
                    </div>
                ', route('panel.users.edit' , ['user' => $row->id]), $row->id, 'ویرایش');
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

    public function getColumns()
    {
        return [
            Column::make('DT_RowIndex', 'DT_RowIndex')->title('#')->width(20)->searchable(false),
            Column::make('name')->title(trans('user.form.name')),
            Column::make('email')->title(trans('user.form.email')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }
}
