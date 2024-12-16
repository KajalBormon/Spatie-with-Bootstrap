<?php

namespace App\Http\Controllers;

use App\Http\Requests\permission\CreatePermissionRequest;
use App\Http\Requests\permission\UpdatePermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view permission', only:['index']),
            new Middleware('permission:create permission', only:['create','store']),
            new Middleware('permission:edit permission', only:['edit','update']),
            new Middleware('permission:delete permission', only:['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        $permissionData =[
            'permissions' => $permissions
        ];
        return view('permissions.index', $permissionData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request)
    {
        $validatedData = $request->validated();
        Permission::create($validatedData);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $permission = [
            'permission' => $permission
        ];
        return view('permissions.edit', $permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
        $validatedData = $request->validated();
        $permission->update($validatedData);
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->with('success', 'Permission deleted successfully');
    }
}
