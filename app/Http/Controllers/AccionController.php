<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acciones; // Modelo relacionado
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccionController extends Controller
{

    public function index(){
        /** @var \App\Models\User|null $user */
        $user=Auth::user();
        if (!$user->hasRole('SuperAdministrador')) {
            return redirect()->route('dashboard')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }

    $users = User::paginate(10); // Paginación de usuarios
    $rol = Role::whereIn('name', ['administrador', 'superadministrador'])->get();

    return view('users.index', compact('users', 'rol'));
    }
    public function store(Request $request)
    {
        // Obtener las acciones directamente del campo oculto
        $acciones = $request->input('acciones');
    
        // Validar que las acciones sean un array y no estén vacías
        if (!is_array($acciones) || empty($acciones)) {
            return redirect()->back()->withErrors(['acciones' => 'Debes añadir al menos una acción.']);
        }
    
        // Guardar las acciones en la base de datos
        foreach ($acciones as $accion) {
            Acciones::create(['accion' => $accion]);
        }
    
        return redirect()->back()->with('success', 'Acciones guardadas correctamente.');
    }
   /* public function store(Request $request)
    {
       // Validar los datos 
    $validated = $request->validate([
        'accion' => 'required|array',       
        'accion.*' => 'required|string|max:255', 
    ]);
     // Guardar cada acción en la base de datos
     foreach ($validated['accion'] as $accion) {
        Acciones::create([
            'accion' => $accion,  // Guardamos cada acción individualmente
        ]);

    return redirect()->back()->with('success', 'Acciones guardadas correctamente.');
    }
}*/ 
}
