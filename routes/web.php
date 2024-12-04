<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

// pruebas
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// ruta usuarios

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
    })->middleware('role:SuperAdministrador');


Route::get('/objetivo', function () {
    return view('objetivos.objetivo'); // Carga la vista en resources/views/objetivos/objetivos.blade.php
});

Route::get('/accion', function () {
    return view('acciones.accion');
});

// rutas responsables:
Route::prefix('responsables')->group(function () {
    Route::get('/', [ResponsableController::class, 'index'])->name('responsables.index'); 
    Route::post('/guardar', [ResponsableController::class, 'store'])->name('responsables.store'); 
});

require __DIR__ . '/auth.php';
