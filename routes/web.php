<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CobradorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Autenticado  y Admin*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('clientes', ClienteController::class)
        ->except('create');

    Route::resource('cobradors', CobradorController::class)
        ->except('create');

    Route::get('registros/clientes/{id}', [RegistroController::class, 'index'])
        ->name('registros.index');

    Route::get('cobrador-clientes/{id}', [CobradorController::class, 'clientes'])
        ->name('cobradors.clientes');

    Route::get('ingresos', [IngresoController::class, 'index'])
        ->name('ingresos.index');
});

/* Autenticado */
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('recibo/cliente/{id}', [ServicioController::class, 'recibo'])
        ->name('servicios.recibo');

    Route::put('password/{user}', [UserController::class, 'password'])
        ->name('password');

    Route::resource('servicios', ServicioController::class);

    Route::resource('user', UserController::class);
});

Auth::routes();
