<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\GroupDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Panel\Group;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $group;
    public function __construct(Group $group)
    {
        $this->group = new GroupRepository($group);
    }


    /**
     * Display a listing of the resource.
     *
     * @param GroupDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(GroupDataTable $dataTable)
    {
        return $dataTable->render('panel.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('panel.group.create');
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
            $this->group->create($request->only(['name']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.groups.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Group $group)
    {
        return view('panel.group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Group $group
     * @return array
     */
    public function update(UpdateRequest $request, Group $group)
    {
        DB::beginTransaction();
        try {
            $this->group->update($request->only(['name']), $group);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.groups.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
