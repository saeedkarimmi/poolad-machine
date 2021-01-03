<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\MachineModelDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MachineModel\StoreRequest;
use App\Http\Requests\MachineModel\UpdateRequest;
use App\Models\Panel\MachineDrive;
use App\Models\Panel\MachineModel;
use App\Models\Panel\MachineSeries;
use App\Models\Panel\MachineType;
use App\Models\Panel\MachineWeight;
use App\Repositories\MachineModelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MachineModelControlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected MachineModelRepository $machineModel;
    public function __construct(MachineModel $machineModels)
    {
        $this->machineModel = new MachineModelRepository($machineModels);
    }

    /**
     * Display a listing of the resource.
     *
     * @param MachineModelDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(MachineModelDataTable $dataTable)
    {
        return $dataTable->render('panel.machine-model.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $drives = MachineDrive::all();
        $weights = MachineWeight::all();
        $series = MachineSeries::all();
        $types = MachineType::all();
        return view('panel.machine-model.create', compact('drives', 'weights', 'series', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->machineModel->create($request->only(['machine_drive_id','machine_weight_id','machine_series_id', 'machine_type_id']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.machine_models.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MachineModel $machineModel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(MachineModel $machineModel)
    {
        $drives = MachineDrive::all();
        $weights = MachineWeight::all();
        $series = MachineSeries::all();
        $types = MachineType::all();
        return view('panel.machine-model.edit', compact('machineModel', 'weights', 'series', 'types', 'drives'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param MachineModel $machineModel
     * @return array
     */
    public function update(UpdateRequest $request, MachineModel $machineModel)
    {
        DB::beginTransaction();
        try {
            $this->machineModel->update($request->only(['machine_drive_id','machine_weight_id','machine_series_id', 'machine_type_id']), $machineModel);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.machine_models.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
