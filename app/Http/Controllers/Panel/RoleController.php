<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Panel\MenuItem;
use App\Repositories\MenuItemRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $role;
    protected $permission ;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = new RoleRepository($role);
        $this->permission = new PermissionRepository($permission);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role->all();

        return view('panel.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = $this->permission->pluck('name','id');
        return view('panel.role.create' , compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return array
     */
    public function store(StoreRoleRequest $request)
    {
        DB::beginTransaction();
        try {
            /** @var Role $role */
            $role = $this->role->create($request);

            $role->givePermissionTo(request()->permissions);

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.roles.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $rolePermissions = $role->permissions()->pluck('id')->toArray();
        $permissions = $this->permission->pluck('name','id');

        return view('panel.role.edit' , compact('permissions' , 'role' , 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return array
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::beginTransaction();
        try {
            $role->syncPermissions($request->get('permissions'));

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.roles.index'));

        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
