<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        $permissions = Permission::all();
        return view('users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        if ($request->role === 'Administrador') {
            $user->syncPermissions([]); 
        } else {
            $user->syncPermissions($request->permissions ?? []);
        }

        return redirect('/usuarios');
    }

    public function edit(User $usuario)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('users.edit', compact('usuario', 'roles', 'permissions'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $usuario->update([
                'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            ]);
        }

        $usuario->syncRoles([$request->role]);

        $usuario->syncPermissions($request->permissions ?? []);

        return redirect('/usuarios');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect('/usuarios');
    }
}
