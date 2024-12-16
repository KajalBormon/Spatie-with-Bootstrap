<?php

namespace App\Http\Controllers;

use App\Http\Requests\role\CreateRoleRequest;
use App\Http\Requests\role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view role', only:['index']),
            new Middleware('permission:create role', only:['create','store']),
            new Middleware('permission:edit role', only:['edit','update']),
            new Middleware('permission:delete role', only:['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);

        $rolesData = [
            'roles' => $roles
        ];

        return view('roles.index', $rolesData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        $permissionsData= [
            'permissions' => $permissions
        ];
        return view('roles.create', $permissionsData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $createRoleRequest)
    {
        $validatedData = $createRoleRequest->validated();

        $role = Role::create(['name' => $validatedData['name']]);
        $role->syncPermissions($validatedData['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $roleData = [
            'role' => $role,
            'permissions' => $permissions
        ];

        return view('roles.edit', $roleData);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $updateRoleRequest, Role $role)
    {
        $validatedData = $updateRoleRequest->validated();
        $role->update($validatedData);
        $role->syncPermissions($validatedData['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
