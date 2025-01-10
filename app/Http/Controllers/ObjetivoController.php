<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
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

        $query = Objetivo::query()->with(['areas' => function ($q) {
            $q->with('area'); // Cargar el área asociada dinámicamente
        }]);


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

        $objetivos = $query->paginate(10);
        // dd($query);

        return view('objetivos.index', compact('objetivos', 'filter'));
    }
}
