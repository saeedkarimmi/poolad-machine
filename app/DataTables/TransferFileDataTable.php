<?php

namespace App\DataTables;

use App\Models\Panel\TransferFile;
use App\Models\Views\TransferFileView;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransferFileDataTable extends BaseDataTable
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
            ->editColumn('action', function ($row){
                return sprintf(
                    '<a href="%s" title="%s"><i class="fa fa-eye text-navy"></i></a>
                            <a href="%s" title="%s"><i class="fa fa-edit text-navy"></i></a>',
                    route('panel.transfer_files.show', $row->id), __('general.form.show'),
                    route('panel.transfer_files.edit', $row->id), __('general.form.edit')
                );
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param TransferFileView $model
     * @return Builder
     */
    public function query(TransferFileView $model)
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

            Column::make('file_number')->title(trans('validation.attributes.file_number')),
            Column::make('seller_name')->title(trans('validation.attributes.seller_id')),
            Column::make('shipping_name')->title(trans('validation.attributes.shipping_name')),
            Column::make('insurance_number')->title(trans('validation.attributes.insurance_number')),
            Column::make('freight_number')->title(trans('validation.attributes.freight_number')),
            Column::make('freight_date')->title(trans('validation.attributes.freight_date')),
            Column::make('arrival_notice_date')->title(trans('validation.attributes.arrival_notice_date')),
            Column::make('release_date')->title(trans('validation.attributes.release_date')),
            Column::make('order_name')->title(trans('validation.attributes.order_name')),

            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }
}
