<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(Request $request)
    {

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $user->load('puesto', 'area', 'roles');

        if (!$user->hasRole('Administrador')) {
            if ($user->hasRole('SuperAdministrador')) {
                return redirect()->route('dashboard')
                    ->with('alert', 'No hay necesidad de entrar a esta ruta');
            }
            return redirect()->route('general')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }

        return view('dashboard.admin', compact('user'));
    }
}
