<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\ContainerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Container\StoreRequest;
use App\Http\Requests\Container\UpdateRequest;
use App\Models\Panel\Container;
use App\Repositories\ContainerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContainerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $container;
    public function __construct(Container $container)
    {
        $this->container = new ContainerRepository($container);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ContainerDataTable $dataTable
     * @return void
     */
    public function index(ContainerDataTable $dataTable)
    {
        return $dataTable->render('panel.container.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.container.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->container->create($request->only(['name']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.containers.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Container $container
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Container $container)
    {
        return  view('panel.container.edit', compact('container'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Container $container
     * @return array
     */
    public function update(UpdateRequest $request, Container $container)
    {
        DB::beginTransaction();
        try {
            $this->container->update($request->only(['name']), $container);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.containers.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
