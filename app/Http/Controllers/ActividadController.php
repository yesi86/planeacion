<?php

namespace App\Http\Controllers;

use App\Models\Acciones;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function obtenerAcciones()
{
    $acciones = Acciones::all();
    return response()->json($acciones);
}

   
}
