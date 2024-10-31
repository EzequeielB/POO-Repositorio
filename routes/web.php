<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EquiposDeTrabajoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'posts.index')->name('home');
Route::middleware('guest')->group(function() {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('ordenes', OrdenController::class);
    Route::resource('equipos', EquipoController::class);
    Route::resource('equiposdetrabajo', EquiposDeTrabajoController::class);
    Route::resource('clientes', ClienteController::class);
    
    Route::get('/clientes/inactivos', [ClienteController::class, 'inactivos'])->name('clientes.inactivos');
    Route::post('/clientes/{cliente}/rehabilitar', [ClienteController::class, 'up'])->name('clientes.rehabilitar');
    
    Route::resource('tecnicos', TecnicoController::class);
});