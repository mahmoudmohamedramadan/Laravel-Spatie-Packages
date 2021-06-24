<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $rolePermissions =  $role->with('permissions')->get();

        return view('permissions.index', compact('rolePermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('permissions.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $data = $this->validatePermission($request);

        $permission = Permission::create(["name" => $data['name']]);

        /* to assign a set of permissions to a role do this */
        // $role->syncPermissions($permission);
        /* alos you can use this form */
        // $role->permissions()->sync($createdPermission);

        /* to assign permission (singular) to a role do this */
        $role->givePermissionTo($permission);
        /* or this */
        // $permission->assignRole($role);

        return back()->with("success", "data saved successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Role $role, Permission $permission)
    {
        return view('permissions.create', compact('role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Spatie\Permission\Models\Role $role
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, Permission $permission)
    {
        $data = $this->validatePermission($request);

        $role->permissions()
            ->where('id', $permission->id)
            ->get()
            ->first()
            ->update(['name' => $data['name']]);

        return back()->with("success", "data saved successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Permission $permission)
    {
        $role->permissions()
            ->where('id', $permission->id)
            ->get()
            ->first()
            ->delete();

        return redirect()->route('roles.permissions.index', compact('role'));
    }

    /**
     * Validate permission input
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validatePermission($request)
    {
        return $request->validate([
            'name' => 'required|unique:permissions,name,' . $request->id,
        ]);
    }
}
