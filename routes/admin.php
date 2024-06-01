<?php

use App\Http\Controllers\Backend\CarrerasAreas\AreaController;
use App\Http\Controllers\Backend\CarrerasAreas\AreaExistenteController;
use App\Http\Controllers\Backend\CarrerasAreas\CarreraController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PersonaController;
use App\Http\Controllers\Backend\PreguntaController;
use App\Http\Controllers\Backend\Territoriales\DepartamentoController;
use App\Http\Controllers\Backend\Territoriales\MunicipioController;
use App\Http\Controllers\Backend\Territoriales\ProvinciaController;
use App\Http\Controllers\Backend\TestController;
// use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;


/* init::Rutas del sistema de administración*/

// Route::get('/test', [TestingController::class, 'index'])->name('/test');
Route::get('/dashboard', [PreguntaController::class, 'index'])->middleware(['auth'])->name('dashboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Route::resource('admin/persona', PersonaController::class)->middleware(['auth'])->names('admin-persona');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('persona', PersonaController::class)->names('admin-persona');
    Route::resource('sovi3', PersonaController::class)->names('admin-sovi3');
    Route::resource('test', TestController::class)->names('admin-test');
    Route::resource('pregunta', PreguntaController::class)->names('admin-pregunta');

    Route::resource('estudiante', PreguntaController::class)->names('admin-estudiante');
    Route::resource('respuesta', PreguntaController::class)->names('admin-respuesta');

    Route::resource('departamento', DepartamentoController::class)->names('admin-departamento');
    Route::resource('provincia', ProvinciaController::class)->names('admin-provincia');
    Route::resource('municipio', MunicipioController::class)->names('admin-municipio');
    Route::resource('colegio', AreaController::class)->names('admin-colegio');

    Route::resource('area', AreaController::class)->names('admin-area');
    Route::resource('carrera', CarreraController::class)->names('admin-carrera');
    Route::resource('area-existente', AreaExistenteController::class)->names('admin-area-existente');

    Route::get('baremo', [TestController::class, 'baremo'])->name('baremo');
});

/* end::Rutas del sistema de administración*/
