<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acciones; // Modelo relacionado
use App\Models\Objetivo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccionController extends Controller
{

    public function index(){
        $acciones=Acciones::all();
        $agregar = session('acciones', []);
        $objetivos = Objetivo::all();

        return view('acciones.accion', compact('acciones', 'agregar','objetivos'));
    }

    public function addaccion(Request $request){
        $accion = $request->input('campo1');

        if (!$accion ) {
            return response()->json(['error' => 'porfavor, ingresa una accion'], 400);
        }

        $agregar = session('acciones', []);
        $agregar[] = ['accion' => $accion];

        session(['acciones' => $agregar]);

        return response()->json(['agregar' => $agregar]);


    }
    public function store(Request $request)
    {
        $agregar = session('acciones', []);

        foreach ($agregar as $item) {
            Acciones::create([
                'accion' => $item['accion']  
            ]);
        }

        session()->forget('acciones'); // Limpiar la cola después de guardar

        return redirect()->route('acciones.index')->with('success', 'acciones guardadas correctamente.');
    }
    public function getagregar()
    {
        $agregar = session('acciones', []);
        return response()->json(['agregar' => $agregar]);
    }
/*
    public function index(){
        /** @var \App\Models\User|null $user 
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
   public function store(Request $request)
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
