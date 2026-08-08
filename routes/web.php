<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoIncidenteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UnidadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Tipos de Incidentes
    Route::resource('tipos-incidentes', TipoIncidenteController::class);

    // CRUDs Funcionarios y Unidades
    Route::resource('funcionarios', FuncionarioController::class);
    
    // CRUD Unidades con el parámetro corregido
    Route::resource('unidades', UnidadController::class)->parameters([
        'unidades' => 'unidad'
    ]);
});

require __DIR__ . '/auth.php';