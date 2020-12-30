<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\SellerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\StoreRequest;
use App\Http\Requests\Seller\UpdateRequest;
use App\Models\Panel\Seller;
use App\Repositories\SellerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $seller;
    public function __construct(Seller $seller)
    {
        $this->seller = new SellerRepository($seller);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SellerDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(SellerDataTable $dataTable)
    {
        return $dataTable->render('panel.seller.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.seller.create');
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
            $this->seller->create($request->only(['name', 'phoneNumber','email']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.sellers.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Seller $seller)
    {
        return view('panel.seller.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Seller $seller
     * @return array
     */
    public function update(UpdateRequest $request, Seller $seller)
    {
        DB::beginTransaction();
        try {
            $this->seller->update($request->only(['name', 'phoneNumber','email']), $seller);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.sellers.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
