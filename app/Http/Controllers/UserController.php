<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Paginación de 10 usuarios por página

        // Obtengo los roles disponibles
        $rol = Role::whereIn('name', ['administrador', 'superadministrador'])->get();

        return view('users.index', compact('users', 'rol'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Asignar el rol al usuario
        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }
}
