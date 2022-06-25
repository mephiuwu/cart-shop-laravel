<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\JuegosController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\GamesController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [HomeController::class, 'main'])->name('home');

Auth::routes();

Route::prefix('store')->group(function () {
    Route::prefix('/games')->group(function () {
        Route::get('/', [GamesController::class, 'getStore'])->name('store.games');
        Route::get('/single/{id}', [GamesController::class, 'single'])->name('store.games.single');
        Route::post('/addCart', [GamesController::class, 'addCart'])->name('store.games.cart');
    });
});

Route::prefix('cart')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::get('/refreshCart', [CartController::class, 'refreshCart'])->name('cart.refreshCart');
});

Route::middleware(['auth','authAdmin'])->group(function () {
    Route::prefix('adm')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');

        Route::prefix('/juegos')->group(function () {
            //Vistas
            Route::get('/', [JuegosController::class, 'index'])->name('juegos.index');
            Route::get('/crear', [JuegosController::class, 'crear'])->name('juegos.crear');
            Route::get('/editar/{id}', [JuegosController::class, 'editar'])->name('juegos.editar');
        
            //procesos
            Route::get('/getAll', [JuegosController::class, 'getAll'])->name('juegos.getJuegos');
            Route::post('/processCreate', [JuegosController::class, 'processCreate'])->name('juegos.processCreate');
            Route::post('/processEdit', [JuegosController::class, 'processEdit'])->name('juegos.processEdit');
            Route::post('/eliminar', [JuegosController::class, 'eliminar'])->name('juegos.eliminar');
        });

        Route::prefix('/inicio')->group(function () {
            Route::get('/', [JuegosController::class, 'index'])->name('admin.inicio');
        });
    });
});



