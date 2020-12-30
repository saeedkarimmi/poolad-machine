<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\BankDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\StoreRequest;
use App\Http\Requests\Bank\UpdateRequest;
use App\Models\Panel\Bank;
use App\Repositories\BankRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $bank;
    public function __construct(Bank $bank)
    {
        $this->bank = new BankRepository($bank);
    }

    /**
     * Display a listing of the resource.
     *
     * @param BankDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(BankDataTable $dataTable)
    {
        return $dataTable->render('panel.bank.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.bank.create');
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
            $this->bank->create($request->only(['name', 'code']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.banks.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bank $bank
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Bank $bank)
    {
        return view('panel.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Bank $bank
     * @return array
     */
    public function update(UpdateRequest $request, Bank $bank)
    {
        DB::beginTransaction();
        try {
            $this->bank->update($request->only(['name', 'code']), $bank);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.banks.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
