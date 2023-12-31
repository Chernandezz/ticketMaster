<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BoletasController;

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/comprar/{id}', [PaymentController::class, 'comprar']);
Route::post('/pago', [PaymentController::class, 'pago']);
Route::get('eventos/{id}', [EventController::class, 'show']);
Route::get('/send-email', [EmailController::class, 'index']);
Route::get('/verificarBoletas', [BoletasController::class, 'verificar']);
Route::post('/verificarBoletas', [BoletasController::class, 'comprobar']);
Route::get('/servicioAlCliente', [BoletasController::class, 'servicioAlCliente']);
Route::post('/servicioAlCliente', [BoletasController::class, 'enviarMensaje']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::group(['prefix' => 'eventos'], function () {
        Route::get('/crear', [EventController::class, 'create']);
        Route::post('/', [EventController::class, 'store']);
        Route::delete('/{id}', [EventController::class, 'destroy']);
    });
});
