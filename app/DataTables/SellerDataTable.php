<?php

namespace App\DataTables;

use App\Models\Panel\Seller;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerDataTable extends BaseDataTable implements DatabaseInterface
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
                    route('panel.sellers.edit', $row->id), __('general.form.edit'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Seller $seller
     * @return Builder
     */
    public function query(Seller $seller)
    {
        return $seller->newQuery();
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
            Column::make('name')->title(trans('validation.attributes.name')),
            Column::make('phoneNumber')->title(trans('validation.attributes.phoneNumber')),
            Column::make('email')->title(trans('validation.attributes.email')),
            Column::make('tel')->title(trans('validation.attributes.tel')),
            Column::make('fax')->title(trans('validation.attributes.fax')),
            Column::make('agent')->title(trans('validation.attributes.agent')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }

    protected function getBuilderParameters()
    {
        $params = parent::getBuilderParameters();
        array_unshift($params['buttons'], [
            'text' => 'ایجاد فروشنده جدید',
            'className' => 'action',
            'action' => 'function(e, dt, node, config) { var u = "' . route('panel.sellers.create') . '"; window.location.href = u; }'
        ]);
        return $params;
    }
}
