<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DespesaController;


Route::get('/', function () {
    return redirect()->route('produtos.index');
});

// Rotas de Categorias
Route::resource('categorias', CategoriaController::class);

// Rotas de Produtos
Route::resource('produtos', ProdutoController::class);

// Rotas de Clientes
Route::resource('clientes', ClienteController::class);

// Rotas de Vendas
Route::resource('vendas', VendaController::class);
Route::get('/vendas/create', [VendaController::class, 'create'])->name('vendas.create');


// Rotas de Despesas
Route::resource('despesas', DespesaController::class);
Route::get('/despesas/{id}/edit', [DespesaController::class, 'edit'])->name('despesas.edit');

