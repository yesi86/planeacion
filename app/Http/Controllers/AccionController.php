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
        $acciones = Acciones::all();
        $agregar = session('acciones', []);
        $objetivos = Objetivo::all();
        return view('acciones.accion', compact('acciones', 'agregar', 'objetivos'));
    }

    public function addaccion(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'campoAccion' => 'required|string',
            'selectObjetivo' => 'required|integer',
        ]);

        // Obtener los datos del formulario
        $campoAccion = $request->input('campoAccion');
        $selectObjetivo = $request->input('selectObjetivo');

        // Crear la acción (ejemplo simple, puedes personalizarlo según tu modelo)
        $accion = [
            'accion' => $campoAccion,
            'objetivo' => $selectObjetivo, // En este caso, solo guardamos el ID del objetivo
        ];

        // Obtener la cola de acciones actual (puede estar en la sesión o en la base de datos)
        $colaAcciones = session()->get('colaAcciones', []);

        // Añadir la nueva acción a la cola
        $colaAcciones[] = $accion;

        // Guardar la cola actualizada en la sesión
        session()->put('colaAcciones', $colaAcciones);

        // Retornar la cola actualizada en formato JSON
        return response()->json([
            'success' => true,
            'queue' => $colaAcciones, // Retornamos la cola actualizada
        ]);
    }

    public function store(Request $request)
{
    // Obtener las acciones en cola
    $colaAcciones = session('colaAcciones', []);

    if (empty($colaAcciones)) {
        return redirect()->route('acciones.index')->withErrors(['error' => 'No hay acciones para guardar.']);
    }

    // Guardar las acciones en la base de datos
    foreach ($colaAcciones as $item) {
        Acciones::create([
            'accion' => $item['accion'],
            'objetivo_id' => $item['objetivo'], // Usa el ID del objetivo
        ]);
    }

    // Limpiar la cola después de guardar
    session()->forget('colaAcciones');

    return redirect()->route('acciones.index')->with('success', 'Acciones guardadas correctamente.');
}


    public function getagregar()
    {
        $agregar = session('acciones', []);
        return response()->json(['agregar' => $agregar]);
    }

    public function obtenerCola()
    {
        $agregar = session('acciones', []);
        return response()->json(['agregar' => $agregar]);
    }

    public function actualizarCola(Request $request)
    {
        $agregar = $request->input('agregar', []);
    
        // Verifica que sea un array válido
        if (!is_array($agregar)) {
            return response()->json(['success' => false, 'message' => 'Formato inválido']);
        }
    
        // Actualiza la cola en la sesión
        session(['acciones' => $agregar]);
    
        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        // Validar el índice recibido
        $request->validate([
            'index' => 'required|integer|min:0',
        ]);

        $index = $request->input('index');

        // Obtener la cola de acciones actual
        $colaAcciones = session()->get('colaAcciones', []);

        // Verificar si el índice es válido
        if (isset($colaAcciones[$index])) {
            // Eliminar la acción del índice especificado
            array_splice($colaAcciones, $index, 1);

            // Actualizar la cola en la sesión
            session()->put('colaAcciones', $colaAcciones);

            // Retornar la cola actualizada
            return response()->json([
                'success' => true,
                'queue' => $colaAcciones,
            ]);
        }

        // Si no se encuentra el índice, retornar error
        return response()->json([
            'success' => false,
            'message' => 'Acción no encontrada.',
        ]);
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
