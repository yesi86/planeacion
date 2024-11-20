<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create'); // La vista del formulario de creación
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image|max:2048', // Foto opcional, debe ser una imagen de hasta 2MB
        ]);

        // si hay, se sube.
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Guardar en storage/public/photos
        }

        //creamos nuestro usuario en base de datos
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash de la contraseña
            'photo' => $photoPath,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Lista los usuarios (futuro)
     */
    public function index()
    {
        $users = User::paginate(10); // Paginación de 10 usuarios por página
        return view('usuarios.index', compact('users'));
    }
}
