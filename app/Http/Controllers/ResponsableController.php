<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsable;

class ResponsableController extends Controller
{
    /**
     * Mostrar lista de responsables.
     */
    public function index()
    {
        $responsables = Responsable::paginate(10); // Paginación
        return view('responsable.index', compact('responsables'));
    }

    /**
     * Guardar un nuevo responsable.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:responsable,email', // Validar correo único
            'password' => 'required|string|min:8|confirmed', // Contraseña obligatoria y debe coincidir con confirmación
            'photo' => 'nullable|image|max:2048', // Foto opcional, pero debe ser una imagen válida
        ]);

        // Manejar la subida de la foto (si existe)
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('responsables', 'public');
        }

        // Crear el responsable
        $responsable = Responsable::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 3, //le puse 3 porque es la id de responsable
            'photo' => $photoPath,
        ]);

        // Verificar si el usuario tiene el rol correcto. condicional trunqueado para probar jeje
        // if (!$responsable->is_responsable) {
        //     $responsable->delete();
        //     return redirect()->route('responsable.index')->withErrors([
        //         'role' => 'El responsable creado no tiene el rol correcto. Por favor, intente nuevamente.'
        //     ]);
        // }
        // Redirigir con mensaje de éxito
        return redirect()->route('responsable.index')->with('success', 'Responsable creado exitosamente.');
    }
}
