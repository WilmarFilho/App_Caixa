<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/relatorio-atual', [App\Http\Controllers\CaixaController::class, 'index'])->name('relAtual');
Route::post('/relatorio-consul', [App\Http\Controllers\CaixaController::class, 'consulta'])->name('relConsul');

Route::resource('produto', 'App\Http\Controllers\ProdutoController');

Route::resource('cliente', 'App\Http\Controllers\ClienteController');

Route::resource('despesa', 'App\Http\Controllers\DespesaController');

Route::resource('venda', 'App\Http\Controllers\VendaController');

Route::post('/produto/{input}/{user}', [App\Http\Controllers\ProdutoController::class, 'ajax'])->name('ajax');
Route::post('/cliente/{input}/{user}', [App\Http\Controllers\ClienteController::class, 'ajaxCliente'])->name('ajaxCliente');

Route::post('/produto-id/{input}/{user}', [App\Http\Controllers\ProdutoController::class, 'ajax2'])->name('ajax2');

Route::post('/produto-tipo', [App\Http\Controllers\ProdutoController::class, 'ConsultaTipo'])->name('consultatipo');
Route::post('/cliente-estado', [App\Http\Controllers\ClienteController::class, 'ConsultaEstado'])->name('consultaEstado');

Route::get('/cliente-id', [App\Http\Controllers\ClienteController::class, 'showCustom'])->name('showCustom');

Route::get('/quita-venda/{cliente}/{venda}/{valor}', [App\Http\Controllers\ClienteController::class, 'quitaVenda'])->name('quitaVenda');