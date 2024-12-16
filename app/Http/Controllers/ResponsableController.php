<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class ResponsableController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user->hasRole('SuperAdministrador') && !$user->hasRole('Administrador')) {
            return redirect()->route('dashboard')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }
        $responsables = User::role('Responsable De Area')->paginate(10);

        return view('responsable.index', compact('responsables'));
    }
}
