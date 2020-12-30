<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\CurrencyDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\StoreRequest;
use App\Http\Requests\Currency\UpdateRequest;
use App\Models\Panel\Currency;
use App\Repositories\CurrencyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $currency;
    public function __construct(Currency $currency)
    {
        $this->currency = new CurrencyRepository($currency);
    }


    /**
     * Display a listing of the resource.
     *
     * @param CurrencyDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CurrencyDataTable $dataTable)
    {
        return $dataTable->render('panel.currency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.currency.create');
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
            $this->currency->create($request->only(['name']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.currencies.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Currency $currency)
    {
        return view('panel.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Currency $currency
     * @return array
     */
    public function update(UpdateRequest $request, Currency $currency)
    {
        DB::beginTransaction();
        try {
            $this->currency->update($request->only(['name', 'code']), $currency);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.currencies.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
