<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/compras', [CompraController::class, 'index_api'])->middleware(['auth', 'verified'])->name('compras');
Route::get('/compras/{id}', [CompraController::class, 'show_api']);
Route::post('/compras', [CompraController::class, 'store_api']);
Route::put('/compras/{id}', [CompraController::class, 'update_api']);
Route::delete('/compras/{id}', [CompraController::class, 'destroy_api']);
