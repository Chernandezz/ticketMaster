<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'])->name('index');
Route::group(['prefix' => 'eventos'], function () {
    Route::get('/{id}', [EventController::class, 'show']);
});

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
