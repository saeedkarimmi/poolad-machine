<?php

namespace App\DataTables;

use App\Models\Base;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BaseDataTable extends DataTable
{

    protected function getBuilderParameters()
    {
        $buttons = /*Auth::user()->isAdministrator()*/true ? [
            ['extend' => 'excel','text' => trans('general.form.excel')],
            ['extend' =>  'print', 'text' => trans('general.form.pdf')]
        ] : [];

        return [
            'buttons' => $buttons,
            'dom' => 'Bfrtip',
            'scrollX' => false,
            'autoWidth' => false,
            'pageLength' => 20,
            'responsive' => true,
            'language' => [
                "sProcessing" => "درحال پردازش...",
                "sLengthMenu" => "نمایش محتویات _MENU_",
                "sZeroRecords" => "موردی یافت نشد",
                "sInfo" => "نمایش _START_ تا _END_ از مجموع _TOTAL_ مورد",
                "sInfoEmpty" => "تهی",
                "sInfoFiltered" => "(فیلتر شده از مجموع _MAX_ مورد)",
                "sInfoPostFix" => "",
                "sSearch" => "جستجو:",
                "sUrl" => "",
                "oPaginate" => [
                    "sFirst" => "ابتدا",
                    "sPrevious" => "قبلی",
                    "sNext" => "بعدی",
                    "sLast" => "انتها"
                ]
            ]
        ];
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addTableClass('table table-striped table-bordered table-hover dataTable')
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return get_class($this). date('YmdHis');
    }
}
