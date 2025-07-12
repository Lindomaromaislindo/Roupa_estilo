<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColecaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PedidoController;

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

Route::get('/cliente',               [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create',        [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/store',        [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/edit/{id}',     [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/update/{id}',   [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/{id}',       [ClienteController::class, 'destroy'])->name('cliente.destroy');
Route::post('/cliente/search',       [ClienteController::class, 'search'])->name('cliente.search');

Route::get('/colecao',               [ColecaoController::class, 'index'])->name('colecao.index');
Route::get('/colecao/create',        [ColecaoController::class, 'create'])->name('colecao.create');
Route::post('/colecao/store',        [ColecaoController::class, 'store'])->name('colecao.store');
Route::get('/colecao/edit/{id}',     [ColecaoController::class, 'edit'])->name('colecao.edit');
Route::put('/colecao/update/{id}',   [ColecaoController::class, 'update'])->name('colecao.update');
Route::delete('/colecao/{id}',       [ColecaoController::class, 'destroy'])->name('colecao.destroy');
Route::post('/colecao/search',       [ColecaoController::class, 'search'])->name('colecao.search');

Route::get('/produto',               [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/create',        [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto/store',        [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/edit/{id}',     [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/update/{id}',   [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{id}',       [ProdutoController::class, 'destroy'])->name('produto.destroy');
Route::post('/produto/search',       [ProdutoController::class, 'search'])->name('produto.search');

Route::get('/fornecedor',             [FornecedorController::class, 'index'])->name('fornecedor.index');
Route::get('/fornecedor/create',      [FornecedorController::class, 'create'])->name('fornecedor.create');
Route::post('/fornecedor/store',      [FornecedorController::class, 'store'])->name('fornecedor.store');
Route::get('/fornecedor/edit/{id}',   [FornecedorController::class, 'edit'])->name('fornecedor.edit');
Route::put('/fornecedor/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');
Route::delete('/fornecedor/{id}',     [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');
Route::post('/fornecedor/search',     [FornecedorController::class, 'search'])->name('fornecedor.search');

Route::get('/pedido',             [PedidoController::class, 'index'])->name('pedido.index');
Route::get('/pedido/create',      [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido/store',      [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/edit/{id}',   [PedidoController::class, 'edit'])->name('pedido.edit');
Route::put('/pedido/update/{id}', [PedidoController::class, 'update'])->name('pedido.update');
Route::delete('/pedido/{id}',     [PedidoController::class, 'destroy'])->name('pedido.destroy');
Route::post('/pedido/search',     [PedidoController::class, 'search'])->name('pedido.search');


Route::get('cliente/pdf', [ClienteController::class, 'report'])->name('cliente.pdf');
Route::get('pedido/pdf', [PedidoController::class, 'report'])->name('pedido.pdf');

