<?php

namespace App\Http\Controllers;

use App\Models\puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        $puestos = Puesto::paginate(10);
        return view('puestos.index', compact('puestos'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:puesto,name|max:255']);
        Puesto::create(['name' => $request->name]);
        return redirect()->route('puestos.index')->with('success', 'Puesto creado exitosamente.');
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
            // return response()->json(['success' => true, 'message' => 'Puesto eliminado correctamente']);
            return redirect()->route('puestos.index')->with('success', 'puesto eliminado exitosamente');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el puesto']);
        }
    }
}
