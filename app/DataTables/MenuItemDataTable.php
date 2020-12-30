<?php

namespace App\DataTables;

use App\Models\Panel\MenuItem;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MenuItemDataTable extends BaseDataTable implements DatabaseInterface
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
            ->editColumn('parent_name', function ($row){
                return isset($row->parent_id) ? $row->parent->name : '-';
            })
            ->filterColumn('parent_name' , function ($query, $keyword) {
                return $query->where('name', 'like', '%'.$keyword.'%');
            })
            ->editColumn('action', function ($row){
                return sprintf('
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="dropdown">عملیات <i class="fa fa-chevron-down"></i> </button>
                        <ul class="dropdown-menu">
                            <li><a href="%s" title="">ویرایش</a></li>
                        </ul>
                    </div>
                ',  route('panel.menu_items.edit', ['menu_item' => $row->id]));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \MenuItem $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MenuItem $model)
    {
        return $model->newQuery()->orderBy('parent_id');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex', 'DT_RowIndex')->title('#')->width(20)->searchable(false),
            Column::make('name')->title(trans('validation.attributes.name'))->orderable()->orderDataType('dom-text'),
            Column::make('parent_name', 'name')->title(trans('validation.attributes.parent_name')),
            Column::make('jalali_created_at')->title(trans('validation.attributes.created_at'))->name('menu_items.created_at')->searchable(false),
            Column::make('jalali_updated_at')->title(trans('validation.attributes.updated_at'))->name('menu_items.created_at')->searchable(false),
            Column::computed('action')->title(trans('validation.attributes.action'))->orderable(false)->exportable(false),
        ];
    }
}
