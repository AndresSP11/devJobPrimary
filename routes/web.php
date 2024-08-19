<?php

use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/* Dashboard la parte del verified */

/* En la parte inicial de la creación de vacantes , vamos a elimnar ciertos parametros...{**function () {return view('dashboard');}??}  */
Route::get('/dashboard',[VacanteController::class,'index'])->middleware(['auth', 'verified'])->name('vacantes.index');
Route::get('/vacantes/create',[VacanteController::class,'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit',[VacanteController::class,'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
/* Muestra sin NECESIDAD DE LOS MIDDLEWARE  REGISTRADOS */
Route::get('/vacantes/{vacante}',[VacanteController::class,'show'])->name('vacantes.show');

Route::get('/notificaciones',NotificacionController::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
