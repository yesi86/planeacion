<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        // Verificar los datos enviados
        //dd($request->all()); // Para depuración, muestra los datos recibidos
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

        // Redirigir con el mensaje de éxito dentro de la misma vista pasas el parametro success
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }


    /**
     * Lista los usuarios (futuro)
     */
    public function index()
    {
        $users = User::paginate(10); // Paginación de 10 usuarios por página
        $rol = Role::all();
        return view('usuarios.index', compact('users', 'rol'));
    }
}
