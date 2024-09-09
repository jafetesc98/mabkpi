<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\FormatosController;
use App\Http\Controllers\FilesController;

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
        Route::get('/comisioneshdr', [App\Http\Controllers\PageController::class, 'comisioneshdr'])->name('comisioneshdr');
        Route::post('/comisionesdet', [App\Http\Controllers\PageController::class, 'comisionesdet'])->name('comisionesdet');
        Route::get('/presupuesto', [App\Http\Controllers\PageController::class, 'presupuesto'])->name('presupuesto');
        Route::post('/presupuestoxsuc', [App\Http\Controllers\PageController::class, 'presupuestoxsuc'])->name('presupuestoxsuc');
        Route::post('/ventasxart', [App\Http\Controllers\PageController::class, 'buscaventasxart'])->name('ventasxart');

        Route::get('/avance', [App\Http\Controllers\PageController::class, 'avancehdr'])->name('avance');
        Route::post('/avancexsuc', [App\Http\Controllers\PageController::class, 'avancexsuc'])->name('avancexsuc');
        Route::get('/evaluacion', [App\Http\Controllers\PageController::class, 'evaluacion'])->name('evaluacion');
        Route::post('/preguntas', [App\Http\Controllers\PageController::class, 'preguntas'])->name('preguntas');
        Route::post('/resultados', [App\Http\Controllers\PageController::class, 'resultados'])->name('resultados');
        Route::get('/error', [App\Http\Controllers\PageController::class, 'error'])->name('error');
        Route::get('/resultadosevaluacion', [App\Http\Controllers\PageController::class, 'resultadosevaluacion'])->name('resultadosevaluacion');
        Route::post('/muestraresultados', [App\Http\Controllers\PageController::class, 'muestraresultados'])->name('muestraresultados');
        Route::post('/resultadosglobales', [App\Http\Controllers\PageController::class, 'resultadosglobales'])->name('resultadosglobales');
        Route::get('/abrirPdf', [App\Http\Controllers\FormatosController::class, 'abrirPdf'])->name('abrirPdf');
        Route::get('/configuracion', [App\Http\Controllers\PageController::class, 'configuracion'])->name('configuracion');
        Route::get('/editarpreg', [App\Http\Controllers\PageController::class, 'editarpreg'])->name('editarpreg');
        Route::post('/acturalizapreg', [App\Http\Controllers\PageController::class, 'acturalizapreg'])->name('acturalizapreg');
        Route::get('/verpregunta', [App\Http\Controllers\PageController::class, 'verpregunta'])->name('verpregunta');
        Route::post('/guardapregunta', [App\Http\Controllers\PageController::class, 'guardapregunta'])->name('guardapregunta');
        Route::get('/eliminapreg', [App\Http\Controllers\PageController::class, 'eliminapreg'])->name('eliminapreg');
        Route::get('/verconfiguracion', [App\Http\Controllers\PageController::class, 'verconfiguracion'])->name('verconfiguracion');
        Route::get('/asignasup', [App\Http\Controllers\PageController::class, 'asignasup'])->name('asignasup');

        Route::post('/actualizasup', [App\Http\Controllers\PageController::class, 'actualizasup'])->name('actualizasup');

        Route::get('/imprimepdf', [App\Http\Controllers\FormatosController::class, 'imprimepdf'])->name('imprimepdf');
        Route::get('/pdfglobal', [App\Http\Controllers\FormatosController::class, 'pdfglobal'])->name('pdfglobal');
        Route::get('/documentos', [App\Http\Controllers\FormatosController::class, 'documentos'])->name('documentos');

        Route::get('/versucursales', [App\Http\Controllers\PageController::class, 'versucursales'])->name('versucursales');
        Route::post('/actdistritos', [App\Http\Controllers\PageController::class, 'actdistritos'])->name('actdistritos');
        Route::post('/eliminadistritos', [App\Http\Controllers\PageController::class, 'eliminadistritos'])->name('eliminadistritos');
        Route::post('/agregadistrito', [App\Http\Controllers\PageController::class, 'agregadistrito'])->name('agregadistrito');
        Route::get('/buscadistrito', [App\Http\Controllers\PageController::class, 'buscadistrito'])->name('buscadistrito');

        Route::post('/subearchivo', [App\Http\Controllers\FilesController::class, 'storeFile'])->name('subearchivo');
    });
});
