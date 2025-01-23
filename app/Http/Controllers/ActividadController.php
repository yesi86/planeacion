<?php

namespace App\Http\Controllers;

use App\Models\Acciones;
use App\Models\Actividad;
use Illuminate\Http\Request;
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

        $query = Actividad::query();
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



        return view('actividades.index', compact('actividades'));
    }
}
