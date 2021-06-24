<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRoles = User::with('roles')->get();

        return view('roles.index', compact('userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get(["name"]);

        return view('roles.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRole($request);

        /* hasRole() function used to used if auhenticated user has passed role */
        if (!auth()->user()->hasRole($data['name'])) {
            $role = Role::create(['name' => $data['name']]);
            /* assignRole() function used to assign/reference this given role to authenticated role, So we can get this role later. you can also pass an array to this function */
            auth()->user()->assignRole($data['name']);

            return back()->with('success', 'data saved successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.create', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $this->validateRole($request);
        $role->update([
            'name' => $data['name'],
        ]);

        return back()->with('success', 'data saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }

    /**
     * Validate role input
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateRole($request)
    {
        return $request->validate([
            'name' => 'required|unique:roles,name,' . $request->id,
        ]);
    }
}
