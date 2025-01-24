<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GeneralController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if ($user->hasRole('SuperAdministrador')) {
            return redirect()->route('dashboard')
                ->with('alert', 'No puedes entrar a esta ruta');
        } elseif ($user->hasRole('Administrador')) {
            return redirect()->route('admin')
                ->with('alert', 'No puedes entrar a esta ruta');
        }

        return view('dashboard.general');
    }
}
