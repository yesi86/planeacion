<?php

namespace App\Http\Controllers;

use App\Models\ObjetoGasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class catalogoObjetoController extends Controller
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
        $order = $request->input('order', 'asc'); // Por defecto 'asc'
        $capituloFilter = $request->input('capitulo');

        $query = ObjetoGasto::query();

        if ($search) {
            $query->where('capitulo', 'like', "%$search%")
                ->orWhere('partida', 'like', "%$search%")
                ->orWhere('descripcion', 'like', "%$search%");
        }

        if ($capituloFilter) {
            $query->where('capitulo', $capituloFilter);
        }

        $query->orderBy('capitulo', $order);

        $objetoGasto = $query->paginate(10);

        $capitulos = [
            '1000_(Serv._Personales)',
            '2000_(Mat._y_Suministros)',
            '3000_(Serv._Generales)',
            '4000_(Subsidios_y_transf)',
            '5000_(Bienes)'
        ];

        return view('objetoGasto.index', compact('objetoGasto', 'capitulos'));
    }
}
