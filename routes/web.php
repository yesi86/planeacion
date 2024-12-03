<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


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

    // Route::get('/admin', function () {
    //     return 'Área Administrativa';
    // })->middleware('role:SuperAdministrador');
    

Route::get('/objetivo', function () {
    return view('objetivos.objetivo'); // Carga la vista en resources/views/objetivos/objetivos.blade.php
});

Route::get('/accion', function () {
    return view('acciones.accion');
});

// rutas responsables:
Route::prefix('responsable')->group(function () {
    Route::get('/', [ResponsableController::class, 'index'])->name('responsable.index'); // Lista de responsables
    Route::post('/guardar', [ResponsableController::class, 'store'])->name('responsables.store'); // Guardar responsable
});

require __DIR__ . '/auth.php';
