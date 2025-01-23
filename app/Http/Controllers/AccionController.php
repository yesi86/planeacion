<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acciones;
use App\Models\Objetivo;
use App\Models\ObjetivoArea;
use App\Models\ObjetoGasto;
use Illuminate\Support\Facades\Auth;

class AccionController extends Controller
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

        $query = Acciones::query()->with(['objetivoArea', 'capitulo']);
        $search = $request->input('search');
        $order = $request->input('order', 'asc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Folio', 'like', "%$search%")
                    ->orWhere('descripcion', 'like', "%$search%");
            });
        }

        $query->orderBy('Folio', $order);
        try {
            $acciones = $query->paginate(10)->appends($request->except('page'));;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        //desde aqui mando los datos para que funcione de forma jerarquica
        $objetivos = Objetivo::all();
        $capitulos = ObjetoGasto::distinct()->pluck('capitulo')->toArray();

        return view('acciones.index', compact('acciones', 'order', 'objetivos', 'capitulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'objetivo_area_id' => 'required|exists:objetivo_areas,id',
            'capitulo' => 'required|string|max:50|exists:catalogo_objeto_gasto,capitulo',
        ]);

        try {
            $accion = new Acciones();
            $accion->descripcion = $request->descripcion;
            $accion->objetivo_area_id = $request->objetivo_area_id;
            $accion->capitulo = $request->capitulo;
            $accion->save();

            return redirect()->route('acciones.index')->with('success', 'Acción creada exitosamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al crear la acción: ' . $e->getMessage());
        }
    }
}
