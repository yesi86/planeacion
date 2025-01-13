<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\AreaSuperior;
use App\Models\AreaResponsable;
use App\Models\Departamento;
use App\Models\DivisionCarrera;
use App\Models\ObjetivoArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivoController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user->hasRole('SuperAdministrador')) {
            return redirect()->route('dashboard')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }

        $search = $request->input('search');
        $order = $request->input('order', 'asc');
        $filter = $request->input('filter');

        $query = Objetivo::query()->with(['objetivoAreas.area']);



        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Folio', 'like', "%$search%")
                    ->orWhere('descripcion', 'like', "%$search%");
            });
        }


        if ($filter) {
            $query->whereHas('ObjetivoAreas', function ($q) use ($filter) {
                $q->where('tipo', $filter);
            });
        }

        $query->orderBy('Folio', $order);

        try {
            $objetivos = $query->paginate(10);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }


        return view('objetivos.index', compact('objetivos', 'filter'));
    }
    public function getAreas(Request $request)
    {
        // Obtener el tipo enviado desde el frontend
        $tipo = $request->input('tipo'); // 'area_superior', 'area_responsable', etc.

        // Inicializar la variable de áreas
        $areas = [];

        // Verificar el tipo y obtener las áreas correspondientes
        switch ($tipo) {
            case 'area_superior':
                $areas = AreaSuperior::all(['id', 'nombre']); // Cambiar 'nombre' al campo correcto en la tabla
                break;
            case 'area_responsable':
                $areas = AreaResponsable::all(['id', 'nombre']); // Cambiar 'nombre' al campo correcto
                break;
            case 'departamento':
                $areas = Departamento::all(['id', 'nombre']); // Cambiar 'nombre' al campo correcto
                break;
            case 'divisiones_carrera':
                $areas = DivisionCarrera::all(['id', 'nombre']); // Cambiar 'nombre' al campo correcto
                break;
            default:
                // Si no se pasa un tipo válido, devolver áreas vacías
                $areas = [];
        }

        // Retornar las áreas como JSON
        return response()->json($areas);
    }


    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'areas' => 'required|array|min:1',
            'tipoArea' => 'required|in:area_superior,area_responsable,departamento,divisiones_carrera',
        ]);

        // Crear el objetivo
        $objetivo = new Objetivo();
        $objetivo->descripcion = $request->input('descripcion');
        $objetivo->save();

        // Asociar las áreas al objetivo
        $areas = $request->input('areas'); // Array de ids de las áreas seleccionadas
        foreach ($areas as $areaId) {
            $tipoArea = $request->input('tipoArea'); // Tipo de área seleccionado

            ObjetivoArea::create([
                'objetivo_id' => $objetivo->id,
                'area_id' => $areaId,
                'tipo' => $tipoArea,
            ]);
        }

        return response()->json(['message' => 'Objetivo creado con éxito.'], 201);
    }
}
