<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomProfileController extends Controller
{
    public function show()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $user->load('puesto', 'area', 'roles');

        return view('CustomProfile.show', compact('user'));
    }
}
