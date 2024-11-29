<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResponsableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::controller(LoginController::class)->group(function () {
    Route::get('/inicio', 'mostrar_login')->name('inicio');
    Route::post('/inicio', 'autenticar')->name('login.auth');
    Route::post('/salir', 'logout')->name('login.logout');
});

// // Ruta protegida para el dashboard (accesible por todos los usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// // agregar middleware para empezar autenticacion de los usuarios y así poder iniciar de forma segura en cada campo

// ruta usuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // Lista de usuarios
    Route::get('/crear', [UserController::class, 'create'])->name('users.create'); // Formulario de creación
    Route::get('/roles-permisos', [UserController::class, 'roles'])->name('users.roles'); // Roles y permisos
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Guardar usuario
});

Route::get('/objetivo', function () {
    return view('Objetivos.Objetivo'); // Carga la vista en resources/views/objetivos/objetivos.blade.php
});

Route::get('/accion', function () {
    return view('moduloAcciones.accion');
});

// rutas responsables:
Route::prefix('responsable')->group(function () {
    Route::get('/', [ResponsableController::class, 'index'])->name('responsable.index'); // Lista de responsables
    Route::post('/guardar', [ResponsableController::class, 'store'])->name('responsables.store'); // Guardar responsable
});
// require __DIR__ . '/auth.php';
