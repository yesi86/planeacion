<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $user->load('puesto', 'area', 'roles'); //esto carga los datos del usuarios
        //se hizo así porque es la primera condicional que entra
        if (!$user->hasRole('SuperAdministrador')) {
            if ($user->hasRole('Administrador')) {
                return redirect()->route('admin');
            }
            if ($user->hasRole('Titular De Area|Responsable De Area|Delegado|Jefe De Carrera')) {
                return redirect()->route('general');
            }
        }
        return view('dashboard.superadmin', compact('user'));
    }
}
