<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Module;
use App\Permission;
use App\Common\Authorizable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateRoleRequest;
use App\Http\Requests\Validations\UpdateRoleRequest;

class RoleController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::withCount('users')->get();

        $data['trashes'] = Role::onlyTrashed()->get();

        return view('admin.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::active()->with('permissions')->orderBy('name', 'asc')->get();

        return view('admin.role._create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $role = new Role($request->all());

        $role->save();

        $role->permissions()->sync($request->input('permissions', []));

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $modules = Module::active()->with('permissions')->orderBy('name', 'asc')->get();

        $role_permissions = $role->permissions()->pluck('module_id', 'slug')->toArray();

        return view('admin.role._show', compact('role','modules','role_permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role._edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());

        $role->permissions()->sync($request->input('permissions', []));

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Role $role)
    {
        $role->delete();

        return back()->with('success', trans('messages.trashed', ['model' => $this->model_name]));
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        Role::onlyTrashed()->where('id',$id)->restore();

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $role = Role::onlyTrashed()->find($id);

        $role->forceDelete();

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
