<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\SpiralDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Spiral\StoreRequest;
use App\Http\Requests\Spiral\UpdateRequest;
use App\Models\Panel\Spiral;
use App\Repositories\SpiralRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpiralController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $spiral;
    public function __construct(Spiral $spiral)
    {
        $this->spiral = new SpiralRepository($spiral);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SpiralDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(SpiralDataTable $dataTable)
    {
        return $dataTable->render('panel.spiral.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.spiral.create');
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
            $this->spiral->create($request->only(['name']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.spirals.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Spiral $spiral
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Spiral $spiral)
    {
        return view('panel.spiral.edit', compact('spiral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Spiral $spiral
     * @return array
     */
    public function update(UpdateRequest $request, Spiral $spiral)
    {
        DB::beginTransaction();
        try {
            $this->spiral->update($request->only(['name', 'code']), $spiral);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.spirals.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
