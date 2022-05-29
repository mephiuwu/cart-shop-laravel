<?php

use App\Http\Controllers\JuegosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

Route::prefix('juegos')->group(function () {
    //Vistas
    Route::get('/', [JuegosController::class, 'index'])->name('juegos.index');
    Route::get('/crear', [JuegosController::class, 'crear'])->name('juegos.crear');
    Route::get('/editar/{id}', [JuegosController::class, 'editar'])->name('juegos.editar');

    //procesos
    Route::get('/get_juegos', [JuegosController::class, 'get_juegos'])->name('juegos.getJuegos');
    Route::post('/process_crear', [JuegosController::class, 'process_crear'])->name('juegos.process_crear');
    Route::post('/process_editar', [JuegosController::class, 'process_editar'])->name('juegos.process_editar');
    Route::post('/eliminar', [JuegosController::class, 'eliminar'])->name('juegos.eliminar');
});