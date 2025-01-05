<?php

namespace App\Http\Controllers;

use App\Models\puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order', 'asc'); // Por defecto, ascendente

        // Si hay una búsqueda, filtra y ordena los puestos
        $puestos = Puesto::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
            ->orderBy('name', $order) // Ordenar por nombre según el parámetro
            ->paginate(10);

        if ($search && $puestos->isEmpty()) {
            return redirect()->route('puestos.index')
                ->with('error', 'No se encontraron coincidencias para la búsqueda: "' . $search . '"');
        }

        return view('puestos.index', compact('puestos', 'order'));
    }


    public function store(Request $request)
    {
        if (empty($request->name)) {
            return redirect()->route('puestos.index')
                ->with('error', 'El nombre del puesto es obligatorio.');
        }
        if (Puesto::where('name', $request->name)->exists()) {
            return redirect()->route('puestos.index')
                ->with('error', 'El nombre del puesto ya existe. Intenta con otro.');
        }
        Puesto::create(['name' => $request->name]);

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto creado exitosamente.');
    }
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|unique:puesto,name|max:255']);
        $puesto = Puesto::findOrFail($id);
        $puesto->update(['name' => $request->name]);
        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado exitosamente.');
    }
    public function destroy($id)
    {
        $puesto = Puesto::findOrFail($id);

        try {
            $puesto->delete();
            return redirect()->route('puestos.index')->with('success', 'Puesto eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('puestos.index')->with('error', 'Error al eliminar el puesto.');
        }
    }
}
