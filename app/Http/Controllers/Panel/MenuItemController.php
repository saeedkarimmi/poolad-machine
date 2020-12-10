<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\MenuItemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuItem\StoreRequest;
use App\Http\Requests\MenuItem\UpdateRequest;
use App\Models\Panel\MenuItem;
use App\Repositories\MenuItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $menuItem;
    public function __construct(MenuItem $menuItem)
    {
        $this->menuItem = new MenuItemRepository($menuItem);
    }

    /**
     * Display a listing of the resource.
     *
     * @param MenuItemDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(MenuItemDataTable $dataTable)
    {
        return $dataTable->render('panel.menu-item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuItems = $this->menuItem->all();
        return view('panel.menu-item.create', compact('menuItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->menuItem->create($request->only(['name','parent_id']));
            DB::commit();
            return returnSuccess(trans('general.message.create.success'),route('panel.menu_items.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    public function edit(MenuItem $menuItem)
    {
        $menuItems = $this->menuItem->all();
        return view('panel.menu-item.edit', compact('menuItem','menuItems'));
    }

    /**
     * @param UpdateRequest $request
     * @param MenuItem $menuItem
     * @return array
     */
    public function update(UpdateRequest $request, MenuItem $menuItem)
    {
        DB::beginTransaction();
        try {
            $this->menuItem->update($request->only(['name', 'parent_id']), $menuItem);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'),route('panel.menu_items.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
