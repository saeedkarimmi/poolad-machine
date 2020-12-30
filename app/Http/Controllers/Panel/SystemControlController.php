<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\SystemControlDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemControl\StoreRequest;
use App\Http\Requests\SystemControl\UpdateRequest;
use App\Models\Panel\SystemControl;
use App\Repositories\SystemControlRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemControlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $systemControl;
    public function __construct(SystemControl $systemControl)
    {
        $this->systemControl = new SystemControlRepository($systemControl);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SystemControlDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(SystemControlDataTable $dataTable)
    {
        return $dataTable->render('panel.system-control.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.system-control.create');
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
            $this->systemControl->create($request->only(['name']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.system_controls.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SystemControl $systemControl
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(SystemControl $systemControl)
    {
        return view('panel.system-control.edit', compact('systemControl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param SystemControl $systemControl
     * @return array
     */
    public function update(UpdateRequest $request, SystemControl $systemControl)
    {
        DB::beginTransaction();
        try {
            $this->systemControl->update($request->only(['name']), $systemControl);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.system_controls.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
