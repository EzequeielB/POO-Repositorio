<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\VehiculoController;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

Route::view('/','posts.index')->name('home');
Route::resource('vehiculos', VehiculoController::class);
Route::resource('ordenes', OrdenController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('tecnicos', TecnicoController::class);

Route::middleware('guest')->group(function(){

    Route::view('/register','auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login','auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function(){
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

});

