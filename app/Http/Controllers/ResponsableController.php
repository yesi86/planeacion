<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ResponsableController extends Controller
{
    public function index()
    {
        // Paginación de responsables
        $responsables = Responsable::paginate(10);

        // Obtener roles disponibles
        $roles = Role::where('guard_name', 'web')->get();

        return view('responsable.index', compact('responsables', 'roles'));
    }

    public function store(Request $request)
{
    // Validación de los datos
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',  // Validación de la contraseña
    ]);

    // Crear el responsable
    $responsable = Responsable::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    // Asignar el rol 'responsable'
    $responsable->assignRole('responsable', 'responsable');  // Asignar el rol

    return redirect()->route('responsables.index')->with('success', 'Responsable creado correctamente');;
}

    
    
}
