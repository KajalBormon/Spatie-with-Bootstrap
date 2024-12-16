<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\AssignRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view user', only:['index']),
            new Middleware('permission:assign role', only:['edit','update']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::paginate(10);
        $usersData = [
            'users' => $users,
            'roles' => $roles,
        ];

        return view('users.index',$usersData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $rolesData = [
            'user' => $user,
            'roles' => $roles,
        ];

        return view('users.assignRole',$rolesData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssignRoleRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $user->syncRoles($validatedData['roles']);

        return redirect()->route('users.index')->with('success', 'Role assigned successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
