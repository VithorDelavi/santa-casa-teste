<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect('/usuarios');
    }

    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('users.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, User $usuario)
    {
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $usuario->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $usuario->syncRoles([$request->role]);

        return redirect('/usuarios');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect('/usuarios');
    }
}