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


        $query = Objetivo::query();
        if ($search) {
            $query->where('Folio', 'like', "%$search")
                ->orWhere('descripcion', 'like', "%$search");
        }

        $query->orderBy('Folio', $order);
        $objetivos = $query->paginate(10);
        return view('objetivos.index', compact('objetivos'));
    }
}
