<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RF_B01Controller;
use App\Http\Controllers\RF_B02Controller;
use App\Http\Controllers\RF_B04Controller;

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
Route::get('/home', function () {
    return view('home');
}); 
Route::get('/Produtos/cadastro', [RF_B01Controller::class, 'CadastrarProduto'])->name('Produtos.cadastro');
Route::post('/Produtos/salvar', [RF_B01Controller::class, 'SalvarProduto'])->name('Produtos.salvar');
Route::get('/produtos/editar/{id}', [RF_B04Controller::class, 'EditarProduto'])->name('Produtos.editar');
Route::post('/produtos/atualizar/{id}', [RF_B01Controller::class, 'AtualizarProduto'])->name('Produtos.atualizar');
Route::delete('/produtos/excluir/{id}', [RF_B04Controller::class, 'ExcluirProduto'])->name('Produtos.excluir');

Route::get('/Clientes/cadastro',[RF_B02Controller::class,'CadastrarCliente'])->name('Clientes.cadastro');
Route::post('/Clientes/salvar',[RF_B02Controller::class,'SalvarCliente'])->name('Clientes.Salvar');
Route::get('/Clientes/editar/{id}', [RF_B04Controller::class, 'EditarCliente'])->name('Clientes.editar');
Route::post('/Clientes/atualizar/{id}', [RF_B02Controller::class, 'AtualizarCliente'])->name('Clientes.atualizar');
Route::delete('/Clientes/excluir/{id}', [RF_B04Controller::class, 'ExcluirCliente'])->name('Clientes.excluir');

Route::get('/Fornecedores/cadastro', [RF_B02Controller::class, 'CadastrarFornecedor'])->name('Fornecedores.cadastro');
Route::post('/Fornecedores/salvar', [RF_B02Controller::class, 'SalvarFornecedor'])->name('Fornecedores.salvar');
Route::get('/Fornecedores/editar/{id}', [RF_B04Controller::class, 'EditarFornecedor'])->name('Fornecedores.editar');
Route::post('/Fornecedores/atualizar/{id}', [RF_B02Controller::class, 'AtualizarFornecedor'])->name('Fornecedores.atualizar');
Route::delete('/Fornecedores/excluir/{id}', [RF_B04Controller::class, 'ExcluirFornecedor'])->name('Fornecedores.excluir');