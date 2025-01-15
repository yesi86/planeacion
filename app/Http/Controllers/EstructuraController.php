<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstructuraController extends Controller
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
        $tipoFilter = $request->input('tipo');
        $query = Areas::query();

        if ($search) {
            $query->where('nombre', 'like', "%$search%");
        }
        if ($tipoFilter) {
            $query->where('tipo', $tipoFilter);
        }

        $query->orderBy('nombre', $order);
        $tipos = Areas::distinct()->pluck('tipo')->toArray();
        $areas = $query->paginate(10)->appends($request->except('page'));

        $areasSuperiores = Areas::where('tipo', 'Superior')->get();
        $areasResponsables = Areas::where('tipo', 'Responsable')->get();
        $areasDepartamentos = Areas::where('tipo', 'Departamento')->get();
        $areasInstitutos = Areas::where('tipo', 'Instituto')->get();
        $divisionCarreraId = Areas::where('tipo', 'División de Carrera')->first()?->id;

        return view('estructura.index', compact('areas', 'tipos', 'areasSuperiores', 'areasResponsables', 'areasDepartamentos', 'areasInstitutos', 'divisionCarreraId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'parent_id' => 'nullable|exists:areas,id',  // El parent_id puede ser nulo si es un área raíz
        ]);

        // Lógica especial para "División de Carrera"
        if ($request->input('tipo') === 'División de Carrera') {
            // Buscar la área "Divisiones de Carrera"
            $divisionesDeCarrera = Areas::where('nombre', 'Divisiones de Carrera')->first();

            // Si no existe, mostrar un mensaje de error
            if (!$divisionesDeCarrera) {
                return redirect()->back()->with('error', 'El área "Divisiones de Carrera" no existe. Favor de crearla.');
            }

            // Asignar el parent_id con la ID de "Divisiones de Carrera"
            $request->merge(['parent_id' => $divisionesDeCarrera->id]);
        }

        // Verificar si ya existe un área con el mismo nombre y tipo
        $existingArea = Areas::where('nombre', $request->input('nombre'))
            ->where('tipo', $request->input('tipo'))
            ->first();

        if ($existingArea) {
            return redirect()->route('areas.index')
                ->with('error', 'Ya existe un área con el mismo nombre en este tipo.');
        }

        // Crear el área
        $area = new Areas();
        $area->nombre = $request->input('nombre');
        $area->tipo = $request->input('tipo');
        $area->parent_id = $request->input('parent_id');  // Asignar el parent_id
        $area->save();

        return redirect()->route('areas.index')->with('success', 'Área creada exitosamente');
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Areas::findOrFail($id);

        if ($area->nombre == $validated['name']) {
            return redirect()->route('areas.index')
                ->with('info', 'No se realizaron cambios, el nombre es el mismo.');
        }

        $area->nombre = $validated['name'];
        $area->save();

        return redirect()->route('areas.index')
            ->with('success', 'Área actualizada correctamente');
    }

    public function destroy($id)
    {
        $area = Areas::findOrFail($id);
        $area->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Área eliminada correctamente');
    }
}
