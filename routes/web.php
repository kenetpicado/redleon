<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CobradorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('clientes', ClienteController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('cobradors', CobradorController::class);
    Route::resource('user', UserController::class);
    Route::put('password/{user}', [UserController::class, 'password'])->name('password');
    Route::put('volver-a-pagar/{servicio}', [ServicioController::class, 'pay'])->name('pay');
    Route::get('registros/clientes/{id}', [RegistroController::class, 'index'])->name('registros.index');
    Route::get('cobrador-clientes/{id}', [CobradorController::class, 'clientes'])->name('cobradors.clientes');

});

Auth::routes();

