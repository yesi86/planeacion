<?php

namespace App\Http\Controllers;

use App\Models\Acciones;
use App\Models\Actividad;
use App\Models\Objetivo;
use Illuminate\Http\Request;

class DiccionarioController extends Controller
{
    public function index()
    {
        // Obtener todos los datos de las tres tablas
        $objetivos = Objetivo::all();
        $acciones = Acciones::all();
        $actividades = Actividad::all();

        // Retornar vista con los datos obtenidos
        return view('diccionario.index', compact('objetivos', 'acciones', 'actividades'));
    }
}
