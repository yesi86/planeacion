<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Areas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivoController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user->hasRole('SuperAdministrador')) {
            if ($user->hasRole('Administrador')) {
                return redirect()->route('admin')
                    ->with('alert', 'No tienes permisos para acceder a esta página');
            }
            return redirect()->route('general')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }

        $search = $request->input('search');
        $order = $request->input('order', 'asc');

        $query = Objetivo::query()->with(['areas']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Folio', 'like', "%$search%")
                    ->orWhere('descripcion', 'like', "%$search%");
            });
        }

        $query->orderBy('Folio', $order);

        try {
            $objetivos = $query->paginate(10)->appends($request->except('page'));;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        foreach ($objetivos as $objetivo) {
            $objetivo->num_areas_afectadas = $objetivo->areas->count();
        }

        return view('objetivos.index', compact('objetivos', 'order'));
    }

    public function getAreasByTipo($tipo)
    {
        switch ($tipo) {
            case 'Instituto':
                $areas = Areas::where('tipo', 'Instituto')->get();
                break;
            case 'Superior':
                $areas = Areas::where('tipo', 'Superior')->get();
                break;
            case 'Responsable':
                $areas = Areas::where('tipo', 'Responsable')->get();
                break;
            case 'Departamento':
                $areas = Areas::where('tipo', 'Departamento')->get();
                break;
            case 'División de Carrera':
                $areas = Areas::where('tipo', 'División de Carrera')->get();
                break;
            default:
                $areas = collect();
                break;
        }

        return response()->json($areas);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'tipo_area' => 'required|string',
            'areas_afectadas' => 'required|array|min:1',
            'areas_afectadas.*' => 'exists:areas,id',
        ]);

        $objetivo = Objetivo::create([
            'descripcion' => $validated['descripcion'],
            'tipo_area' => $validated['tipo_area'],
        ]);

        $areasConTipo = [];
        foreach ($validated['areas_afectadas'] as $areaId) {
            $areasConTipo[$areaId] = ['tipo' => $validated['tipo_area']];
        }

        $objetivo->areas()->sync($areasConTipo);

        return redirect()->route('objetivos.index')->with('success', 'Objetivo creado con éxito.');
    }

    public function destroy($id)
    {
        $delete = Objetivo::findOrFail($id);
        try {
            $delete->delete();
            return redirect()->route('objetivos.index')->with('success', 'Objeto Eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('objetivos.index')->with('error', 'Error al eliminar el puesto.');
        }
    }
}
