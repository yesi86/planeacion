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
        $query->orderby('nombre', $order);
        $tipos = Areas::distinct()->pluck('tipo')->toArray();
        $areas = $query->paginate(10)->appends($request->except('page'));
        $areasSuperiores = Areas::whereNull('parent_id')->get();

        return view('estructura.index', compact('areas', 'tipos'));
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
}
