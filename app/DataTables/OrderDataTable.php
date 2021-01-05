<?php

namespace App\DataTables;

use App\Models\Views\OrderView;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends BaseDataTable implements DatabaseInterface
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
            ->editColumn('order_name', function ($row) {
                return sprintf('<a href="%s" title="%s">%s</a>',
                    route('panel.orders.show', $row->id), __('general.form.show'), $row->order_name);
            })
            ->editColumn('registered_at', function ($row) {
                return $row->registered_at ? with(new Carbon($row->registered_at))->format('Y/m/d') : '';
            })
            ->filterColumn('registered_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(registered_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
            })
            ->addColumn('action', function ($row) {
                return sprintf('<a href="%s" title="%s"><i class="fa fa-edit text-navy"></i></a>',
                    route('panel.orders.edit', $row->id), __('general.form.edit'));
            })->rawColumns(['action', 'order_name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param OrderView $model
     * @return Builder
     */
    public function query(OrderView $model)
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
            Column::make('order_name')->title(trans('validation.attributes.order_name')),
            Column::make('seller_name')->title(trans('validation.attributes.seller_id')),
            Column::make('payment_method_name')->title(trans('validation.attributes.payment_method_id')),
            Column::make('machine_number')->title(trans('validation.attributes.machine_number')),
            Column::make('sum')->title(trans('validation.attributes.sum'))/*->orderDataType('dom-number')*/,
            Column::make('jalali_registered_at', 'registered_at')->title(trans('validation.attributes.registered_at') . ' (شمسی)'),
            Column::make('registered_at', 'registered_at')->title(trans('validation.attributes.registered_at'). ' (میلادی)'),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }

    protected function getBuilderParameters()
    {
        $params = parent::getBuilderParameters();
        array_unshift($params['buttons'], [
            'text' => 'ایجاد سفارش جدید',
            'className' => 'action',
            'action' => 'function(e, dt, node, config) { var u = "' . route('panel.orders.create') . '"; window.location.href = u; }'
        ]);
        return $params;
    }
}
