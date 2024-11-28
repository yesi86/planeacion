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
        $responsables = Responsable::with('area')->paginate(10); // Paginación y carga de relaciones
        return view('responsable.index', compact('responsables'));
    }
}
