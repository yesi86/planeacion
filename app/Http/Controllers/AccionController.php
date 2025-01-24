<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acciones;
use App\Models\Objetivo;
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

        $query = Acciones::query();
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
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'objetivo_id' => 'required|exists:objetivo,id',
            'capitulo' => 'required|string|max:255',
        ]);

        try {
            $exite = Acciones::where('descripcion', $validated['descripcion'])
                ->where('objetivo_id', $validated['objetivo_id'])
                ->where('capitulo', $validated['capitulo'])
                ->exists();
            if ($exite) {
                throw new \Exception('Ya existe una descripcion de accion para este objetivo');
            }

            $accion = new Acciones();
            $accion->descripcion = $validated['descripcion'];
            $accion->objetivo_id = $validated['objetivo_id'];
            $accion->capitulo = $validated['capitulo'];
            $accion->save();

            return redirect()->route('acciones.index')
                ->with('success', 'La acción se creó correctamente con el folio ' . $accion->Folio);
        } catch (\Exception $e) {
            return redirect()->route('acciones.index')
                ->with('error', 'Ocurrió un error:' . $e->getMessage());
        }
    }
}
