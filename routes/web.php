<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
        Route::get('/', 'tablero')->name('dashboard-overview-4');
        Route::get('margen', 'margen')->name('margen');
        Route::get('entradas', 'entradas')->name('entradas');
        Route::get('diferencia', 'diferencia')->name('diferencia');
        Route::get('botonesCapas', 'botonesCapas')->name('botonesCapas');
        //Route::get(, 'capas')->name('capas');
        Route::get('capas', 'capas')->name('capas');
        Route::get('/buscar', [App\Http\Controllers\PageController::class, 'buscar'])->name('buscar');
        Route::get('/buscaDif', [App\Http\Controllers\PageController::class, 'buscaDif'])->name('buscaDif');

        Route::get('/ventas', [App\Http\Controllers\PageController::class, 'prov'])->name('ventas');
        
        Route::get('/presupuesto', [App\Http\Controllers\PageController::class, 'presupuesto'])->name('presupuesto');
        Route::post('/presupuestoxsuc', [App\Http\Controllers\PageController::class, 'presupuestoxsuc'])->name('presupuestoxsuc');
        Route::post('/ventasxart', [App\Http\Controllers\PageController::class, 'buscaventasxart'])->name('ventasxart');

        Route::get('/avance', [App\Http\Controllers\PageController::class, 'avancehdr'])->name('avance');
        Route::post('/avancexsuc', [App\Http\Controllers\PageController::class, 'avancexsuc'])->name('avancexsuc');

        //Route::get('/ventas', [App\Http\Controllers\PageController::class, 'ventas'])->name('ventas');
       
    });
});
