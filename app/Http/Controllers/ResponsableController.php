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

        return view('responsable.index', compact('responsables'));
    }

    public function store(Request $request)
{
 
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',  
    ]);

//  checar lo de la asignacion de fotografia, area, delegado, planeacion
    $responsable = Responsable::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

   
    $responsable->assignRole('responsable', 'responsable');  

    return redirect()->route('responsables.index')->with('success', 'Responsable creado correctamente');;
}

    
    
}
