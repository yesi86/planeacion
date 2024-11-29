<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Autentica un usuario común o responsable.
     */
    public function autenticar(Request $request)
    {
        try {
            // Validación de los campos de entrada
            $credenciales = $request->validate([
                'usuario' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // Intentar autenticar como usuario
            if (Auth::guard('web')->attempt(['email' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
                return redirect()->route('dashboard');
            }

            // Intentar autenticar como responsable
            if (Auth::guard('responsable')->attempt(['email' => $credenciales['usuario'], 'password' => $credenciales['password']])) {
                return redirect()->route('dashboard');
            }

            // Si la autenticación falla
            return back()->withErrors([
                'login' => __('auth.failed_authentication'),
            ]);
        } catch (ValidationException $ex) {
            return back()->withErrors([
                'login' => __('auth.not_all_fields'),
            ]);
        }
    }

    /**
     * Muestra la vista del login.
     */
    public function mostrar_login()
    {
        return view('auth.login');
    }

    /**
     * Cierra sesión para cualquier guard.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Cerrar sesión usuarios comunes
        Auth::guard('responsable')->logout(); // Cerrar sesión responsables

        return redirect()->route('inicio');
    }
}
