<?php

namespace App\Http\Controllers;

use App\Models\Acciones;
use App\Models\Actividad;
use App\Models\Objetivo;
use Illuminate\Http\Request;

class PlaneacionController extends Controller
{
    /**
     * Muestra la vista de planeación con objetivos, acciones y actividades.
     */
    public function index()
    {
        $objetivos = Objetivo::all();
        $acciones = Acciones::all();
        $actividades = Actividad::all();

        return view('acciones.planeacion', compact('objetivos', 'acciones', 'actividades'));
    }

    /**
     * Obtiene las acciones relacionadas con un objetivo específico.
     *
     * @param int $objetivoId
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerAcciones($objetivoId)
    {
        // Obtener las acciones relacionadas al objetivo
        $acciones = Acciones::where('objetivo_id', $objetivoId)->get();

        return response()->json($acciones);
    }

    /**
     * Obtiene las actividades relacionadas con una acción específica.
     *
     * @param int $accionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerActividades($accionId)
    {
        $actividades = Actividad::where('accion_id', $accionId)->get();

        if ($actividades->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron actividades para esta acción.',
                'actividades' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Actividades obtenidas con éxito.',
            'actividades' => $actividades
        ], 200);
    }
}
