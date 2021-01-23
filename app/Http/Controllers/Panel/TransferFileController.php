<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\TransferFileDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransferFile\StoreRequest;
use App\Models\Panel\ImportFile;
use App\Models\Panel\TransferFile;
use App\Repositories\TransferFileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferFileController extends Controller
{
    private TransferFileRepository $transferFile;

    public function __construct(TransferFile $transferFile)
    {
        $this->transferFile = new TransferFileRepository($transferFile);
    }
    /**
     * Display a listing of the resource.
     *
     * @param TransferFileDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(TransferFileDataTable $dataTable)
    {
        return $dataTable->render('panel.transfer-file.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param ImportFile $importFile
     * @return array
     */
    public function store(StoreRequest $request, ImportFile $importFile)
    {
        DB::beginTransaction();
        try {
            $this->transferFile->create(['import_file_id' => $importFile->id ] + $request->only([
                'detail_ids',
                'shipping_name',
                'insurance_number',
                'freight_number',
                'freight_date',
                'arrival_notice_date',
                'release_date',
                'transport_details',
            ]));
            DB::commit();
            return returnSuccess(trans('general.message.create.success'),route('panel.transfer_files.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
