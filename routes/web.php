<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipoIncidenteController;
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

    // CRUD Tipos de Incidentes (Franco)
    Route::resource('tipos-incidentes', TipoIncidenteController::class);
});

require __DIR__.'/auth.php';