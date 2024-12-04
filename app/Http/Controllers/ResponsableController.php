<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Responsable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ResponsableController extends Controller
{
    public function index()
    {
        // Paginación de responsables
        $responsables = user::role('Responsable')->paginate(10);

        return view('responsable.index', compact('responsables'));
    }
}
