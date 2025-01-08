<?php

use App\Http\Controllers\AccionController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EstructuraController;
use App\Http\Controllers\PlaneacionController;
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
})->middleware('role:SuperAdministrador|Administrador');

Route::get('/objetivo', [ObjetivoController::class, 'index'])->name('objetivos.index');
Route::post('/objetivo/add', [ObjetivoController::class, 'addToQueue'])->name('objetivos.add');
Route::post('/objetivo/store', [ObjetivoController::class, 'store'])->name('objetivos.store');
Route::get('/objetivo/queue', [ObjetivoController::class, 'getQueue'])->name('objetivos.queue');
Route::post('/objetivo/remove', [ObjetivoController::class, 'removeFromQueue'])->name('objetivos.remove');
// ruta de puestos
Route::prefix('puestos')->group(function () {
    Route::get('/', [PuestoController::class, 'index'])->name('puestos.index');
    Route::post('/store', [PuestoController::class, 'store'])->name('puestos.store');
    Route::put('/update/{id}', [PuestoController::class, 'update'])->name('puestos.update');
    Route::delete('/delete/{id}', [PuestoController::class, 'destroy'])->name('puestos.destroy');
})->middleware('role:SuperAdministrador|Administrador');


Route::get('/planeacion', [PlaneacionController::class, 'index'])->name('planeacion.index');
//rutas acciones
Route::get('/accion', [AccionController::class, 'index'])->name('acciones.index');
Route::post('/accion/add', [AccionController::class, 'addaccion'])->name('acciones.add');
Route::post('/accion/store', [AccionController::class, 'store'])->name('acciones.store');
Route::get('/accion/agregar', [AccionController::class, 'getagregar'])->name('acciones.agregar');
Route::post('/acciones/actualizarcola', [AccionController::class, 'actualizarCola'])->name('acciones.actualizarcola');
Route::get('/acciones/obtenercola', [AccionController::class, 'obtenerCola'])->name('acciones.obtenercola');

// Ruta para el módulo de Estructura/Áreas
Route::prefix('estructura')->group(function () {
    Route::get('/', [EstructuraController::class, 'index'])->name('areas.index');
    Route::post('/areas/store', [EstructuraController::class, 'store'])->name('areas.store');
    Route::put('/update/{id}', [EstructuraController::class, 'update'])->name('areas.update');
    Route::delete('/delete/{id}', [EstructuraController::class, 'destroy'])->name('areas.destroy');
})->middleware('role:SuperAdministrador|Administrador');

//Ruta de planeacion
Route::get('/obtener-acciones/{objetivoId}', [PlaneacionController::class, 'obtenerAcciones']);
Route::get('/obtener-actividades/{accionId}', [PlaneacionController::class, 'obtenerActividades']);


Route::get('/actividadlist', [ActividadController::class, 'obtenerAcciones']);


require __DIR__ . '/auth.php';
