<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:rol,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Guardar la foto si existe
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Crear el usuario
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('role_id'),
            'photo' => $photoPath,
        ]);

        // Asignar el rol al usuario
        $roleId = $request->input('role_id');
        $role = Role::find($roleId);

        // Asignar el rol de forma correcta en la tabla 'model_has_roles'
        $user->roles()->attach($roleId, ['model_type' => get_class($user)]);

        // Redirigir con el mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Lista los usuarios (futuro)
     */
    public function index()
    {
        $users = User::paginate(10); // Paginación de 10 usuarios por página

        // Obtengo los roles disponibles
        $rol = Role::whereIn('name', ['administrador', 'superadministrador'])->get();

        return view('usuarios.index', compact('users', 'rol'));
    }
}
