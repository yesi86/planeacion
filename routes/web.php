<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // Lista de usuarios
    Route::get('/crear', [UserController::class, 'create'])->name('users.create'); // Formulario de creación
    Route::get('/roles-permisos', [UserController::class, 'roles'])->name('users.roles'); // Roles y permisos
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Guardar usuario
});
require __DIR__ . '/auth.php';
