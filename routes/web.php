<?php

use App\Http\Controllers\AutoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\PlanillaController;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('/');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::post('/import-proveedor', [ProveedorController::class, 'import'])->middleware(['auth', 'verified'])->name('import-proveedor');
Route::post('/import-compra', [CompraController::class, 'import'])->middleware(['auth', 'verified'])->name('import-compra');
Route::get('/create-servicio', [IngresoController::class, 'createServicio'])->middleware(['auth', 'verified'])->name('create-servicio');



Route::resource('proveedor', ProveedorController::class);
Route::resource('compra', CompraController::class);
Route::resource('gasto', GastoController::class);
Route::resource('planilla', PlanillaController::class);
Route::resource('ingreso', IngresoController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('auto', AutoController::class);



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
