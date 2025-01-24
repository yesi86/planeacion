<?php

use App\Http\Controllers\AccionController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\catalogoObjetoController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EstructuraController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    //grupos de dashboards
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [SuperAdminController::class, 'index'])->name('dashboard');
    })->middleware('role:SuperAdministrador');

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    })->middleware('role:Administrador');

    Route::prefix('general')->group(function () {
        Route::get('/', [GeneralController::class, 'index'])->name('general');
    })->middleware('role:Titular De Area|Responsable De Area|Delegado|Jefe De Carrera');
    // ruta usuarios
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
    })->middleware('role:SuperAdministrador|Administrador');

    // ruta de puestos
    Route::prefix('puestos')->group(function () {
        Route::get('/', [PuestoController::class, 'index'])->name('puestos.index');
        Route::post('/store', [PuestoController::class, 'store'])->name('puestos.store');
        Route::put('/update/{id}', [PuestoController::class, 'update'])->name('puestos.update');
        Route::delete('/delete/{id}', [PuestoController::class, 'destroy'])->name('puestos.destroy');
    })->middleware('role:SuperAdministrador|Administrador');

    // Ruta para el módulo de Estructura/Áreas
    Route::prefix('estructura')->group(function () {
        Route::get('/', [EstructuraController::class, 'index'])->name('areas.index');
        Route::get('/areas/{tipo}', [EstructuraController::class, 'getAreasByTipo'])->name('areas.byTipo');
        Route::post('/areas/store', [EstructuraController::class, 'store'])->name('areas.store');
        Route::put('/update/{id}', [EstructuraController::class, 'update'])->name('areas.update');
        Route::delete('/delete/{id}', [EstructuraController::class, 'destroy'])->name('areas.destroy');
    })->middleware('role:SuperAdministrador|Administrador');

    // ruta de catalogo objeto de gasto
    Route::prefix('objeto')->group(function () {
        Route::get('/', [catalogoObjetoController::class, 'index'])->name('objeto.index');
        Route::post('/store', [catalogoObjetoController::class, 'store'])->name('objeto.store');
        Route::delete('/delete/{id}', [catalogoObjetoController::class, 'destroy'])->name('objeto.destroy');
        Route::put('/update/{id}', [catalogoObjetoController::class, 'update'])->name('objeto.update');
    })->middleware('role:SuperAdministrador|Administrador');

    // ruta para objetivos
    Route::prefix('objetivos')->group(function () {
        Route::get('/', [ObjetivoController::class, 'index'])->name('objetivos.index');
        Route::get('/areas/{tipo}', [ObjetivoController::class, 'getAreasByTipo'])->name('objetivos.byTipo');
        Route::post('/store', [ObjetivoController::class, 'store'])->name('objetivos.store');
    })->middleware('role:SuperAdministrador|Administrador');

    //ruta para acciones
    Route::prefix('accion')->group(function () {
        Route::get('/', [AccionController::class, 'index'])->name('acciones.index');
        Route::post('/store', [AccionController::class, 'store'])->name('acciones.store');
    })->middleware('role:SuperAdministrador|Administrador');

    //ruta para actividades
    Route::prefix('actividades')->group(function () {
        Route::get('/', [ActividadController::class, 'index'])->name('actividad.index');
        Route::post('/store', [ActividadController::class, 'store'])->name('actividad.store');
        Route::get('/get-partidas/{accionId}', [ActividadController::class, 'getPartidas'])->name('actividad.getPartidas');
    })->middleware('role:SuperAdministrador|Administrador');
});

require __DIR__ . '/auth.php';
