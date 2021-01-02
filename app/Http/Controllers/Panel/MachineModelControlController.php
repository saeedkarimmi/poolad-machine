<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\MachineModelDataTable;
use App\Http\Controllers\Controller;
use App\Models\Panel\MachineModel;
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
    protected MachineModelRepository $machineModels;
    public function __construct(MachineModel $machineModels)
    {
        $this->machineModels = new MachineModelRepository($machineModels);
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
}
