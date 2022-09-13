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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::resource('clientes', ClienteController::class)
        ->except('create');

    Route::resource('servicios', ServicioController::class);

    Route::resource('cobradors', CobradorController::class)
        ->except('create');

    Route::resource('user', UserController::class);
    Route::put('password/{user}', [UserController::class, 'password'])->name('password');
    Route::put('volver-a-pagar/{servicio}', [ServicioController::class, 'pay'])->name('pay');
    Route::get('registros/clientes/{id}', [RegistroController::class, 'index'])->name('registros.index');
    Route::get('cobrador-clientes/{id}', [CobradorController::class, 'clientes'])->name('cobradors.clientes');
    Route::get('ingresos', [IngresoController::class, 'index'])->name('ingresos.index');
    Route::get('detalles/cliente/{id}', [ClienteController::class, 'detalles'])->name('clientes.detalles');
    Route::get('recibo/cliente/{id}', [ServicioController::class, 'recibo'])->name('servicios.recibo');
});

Auth::routes();
