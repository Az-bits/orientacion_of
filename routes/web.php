<?php

use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController as Test;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TestController::class, 'main'])->name('/');
Route::get('/test/{id}', [TestController::class, 'index'])->name('test');
Route::get('/prueba/test', [TestController::class, 'pruebas'])->name('pruebas');
Route::get('/historial', [TestController::class, 'historialEstudiante'])->name('historial');
Route::get('/resultado', [TestController::class, 'main'])->name('res');
Route::post('/resultado', [TestController::class, 'registrarRespuesta'])->name('resultado');
// Route::get('/resultado', [TestController::class, 'registrarRespuesta'])->name('resultado');
Route::get('/registrarse', [TestController::class, 'registrarEstudiante'])->name('registrar');
Route::post('/registrarse', [TestController::class, 'registrarEstudiante'])->name('registrar');
Route::get('/buscarEstudiante/{ci}', [TestController::class, 'buscarEstudiante'])->name('buscar');
Route::get('/getSelect/{tipo}/{id}', [TestController::class, 'getSelects'])->name('get-select');

Route::post('/test', [Test::class, 'index'])->name('test1');

// Route::post('/resultado', function () {
//     return view('frontend/template/result');
// })->name('resultado');

// Route::get('/', function () {
//     return view('Auth/login');
// })->name('/');

// Route::get('/dashboard', function () {
//     return view('admin');
// })->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
