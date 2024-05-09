<?php

use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PersonaController;
use App\Http\Controllers\Backend\PreguntaController;
use App\Http\Controllers\Backend\TestController;
// use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;


/* init::Rutas del sistema de administración*/

// Route::get('/test', [TestingController::class, 'index'])->name('/test');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Route::resource('admin/persona', PersonaController::class)->middleware(['auth'])->names('admin-persona');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('persona', PersonaController::class)->names('admin-persona');
    Route::resource('sovi3', PersonaController::class)->names('admin-sovi3');
    Route::resource('test', TestController::class)->names('admin-test');
    Route::resource('pregunta', PreguntaController::class)->names('admin-pregunta');
    Route::resource('area', AreaController::class)->names('admin-area');

    Route::resource('departamento', AreaController::class)->names('admin-departamento');
    Route::resource('provincia', AreaController::class)->names('admin-provincia');
    Route::resource('municipio', AreaController::class)->names('admin-municipio');
    Route::resource('colegio', AreaController::class)->names('admin-colegio');
});

/* end::Rutas del sistema de administración*/
