<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


/**
 * @property RoleRepository role
 * @property UserRepository user
 */
class UserController extends Controller
{
    public function __construct(User $user, Role $role)
    {
        $this->role = new RoleRepository($role);
        $this->user = new UserRepository($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserDataTable $dataTable
     * @return void
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('panel.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = $this->role->all();
        return view('panel.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->user->create($request->only([
                'name','roles', 'password','email','last_name','status'
            ]));
            DB::commit();
            return returnSuccess(trans('general.message.create.success'),route('panel.users.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        $roles = $this->role->all();
        return view('panel.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return array
     */
    public function update(UpdateRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $this->user->update($request->only([
                'name','roles','email','last_name','status'
            ]), $user);
            DB::commit();
            return returnSuccess(trans('general.message.create.success'),route('panel.users.index'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        if (! Hash::check($request->get('last_password') , $user->password))
            return returnError([trans('general.message.your_current_login_password_is_incorrect')]);

        DB::beginTransaction();
        try {
            $this->user->changePassword($request->only(['new_password']), $user);
//            Auth::login($user);
            DB::commit();
            return returnSuccess(trans('user.message.password_change_was_successful'), route('panel.users.index'), false);
        } catch (\Exception $e){
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
