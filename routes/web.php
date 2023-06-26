<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/comprar/{id}', [PaymentController::class, 'comprar']);


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

Route::get('eventos/{id}', [EventController::class, 'show']);
