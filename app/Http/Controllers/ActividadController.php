<?php

namespace App\Http\Controllers;

use App\Models\Acciones;
use App\Models\Actividad;
use App\Models\ObjetoGasto;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;


class ActividadController extends Controller
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

        $query = Actividad::with(['objetoGasto']);
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
            $actividades = $query->paginate(10)->appends($request->except('page'));;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        //variables para mandar
        $acciones = Acciones::all();


        return view('actividades.index', compact('actividades', 'acciones'));
    }

    public function getPartidas($accionId)
    {
        $accion = Acciones::findOrFail($accionId);
        $partidas = ObjetoGasto::where('capitulo', $accion->capitulo)->get();
        return response()->json(['partidas' => $partidas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'accion_id' => 'required|exists:acciones,id',
            'partida' => 'required',
            'descripcion' => 'required|string|max:255',
        ]);

        $accion = Acciones::findOrFail($request->accion_id);

        Actividad::create([
            'accion_id' => $accion->id,
            'descripcion' => $request->descripcion,
            'capitulo' => $accion->capitulo,
            'partida' => $request->partida,
        ]);

        return redirect()->route('actividad.index')->with('success', 'Actividad creada exitosamente');
    }
    public function destroy($id)
    {
        $actividades = Actividad::findOrFail($id);
        $actividades->delete();
        return redirect()->route('acciones.index')
            ->with('success', 'Actividad eliminada correctamente');
    }
}
