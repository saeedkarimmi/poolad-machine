<?php

namespace App\DataTables;

use App\Models\Panel\ImportFile;
use App\Models\Views\ImportFileView;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ImportFileDataTable extends BaseDataTable
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
                return sprintf(
                    '<a href="%s" title="%s"><i class="fa fa-eye text-navy"></i></a>
                            <a href="%s" title="%s"><i class="fa fa-edit text-navy"></i></a>',
                    route('panel.import_files.show', $row->id), __('general.form.show'),
                    route('panel.import_files.edit', $row->id), __('general.form.edit')
                );
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param ImportFileView $model
     * @return Builder
     */
    public function query(ImportFileView $model)
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
            Column::make('name')->title(trans('validation.attributes.seller_id')),

            Column::make('order_register_issue_date')->title(trans('validation.attributes.order_register_issue_date')),
            Column::make('order_register_validity_date')->title(trans('validation.attributes.order_register_validity_date')),
            Column::make('currency_allocate_issue_date')->title(trans('validation.attributes.currency_allocate_issue_date')),
            Column::make('validity_currency_allotment_date')->title(trans('validation.attributes.validity_currency_allotment_date')),
            Column::computed('action')->title(trans('general.form.action'))->orderable(false)->exportable(false),
        ];
    }
}
