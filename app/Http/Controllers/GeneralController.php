<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(Request $request)
    {

        return view('dashboard.general');
    }
}
