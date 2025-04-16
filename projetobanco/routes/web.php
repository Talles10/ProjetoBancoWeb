<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RF_B01Controller;
use App\Http\Controllers\RF_B02Controller;
use App\Http\Controllers\RF_B03Controller;
use App\Http\Controllers\RF_B04Controller;
use App\Http\Controllers\RF_F01Controller;
use App\Http\Controllers\RF_F02Controller;
use App\Http\Controllers\RF_S01Controller;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
})->name('home');
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

Route::get('/Funcionarios/cadastro', [RF_B03Controller::class, 'CadastrarFuncionario'])->name('Funcionarios.cadastro');
Route::post('/Funcionarios/salvar', [RF_B03Controller::class, 'SalvarFuncionario'])->name('Funcionarios.salvar');
Route::get('/Funcionarios/editar/{id}', [RF_B04Controller::class, 'EditarFuncionario'])->name('Funcionarios.editar');
Route::post('/Funcionarios/atualizar/{id}', [RF_B03Controller::class, 'AtualizarFuncionario'])->name('Funcionarios.atualizar');
Route::delete('/Funcionarios/excluir/{id}', [RF_B04Controller::class, 'ExcluirFuncionario'])->name('Funcionarios.excluir');


Route::get('/Compras/cadastro', [RF_F01Controller::class, 'cadastrarCompra'])->name('Compras.cadastro');
Route::post('/Compras/salvar', [RF_F01Controller::class, 'salvarCompra'])->name('Compras.salvar');
Route::get('/Compras/{id}/editar', [RF_F01Controller::class, 'editarCompra'])->name('Compras.editar');
Route::put('/Compras/{id}/atualizar', [RF_F01Controller::class, 'atualizarCompra'])->name('Compras.atualizar');
Route::delete('/Compras/{id}/excluir', [RF_F01Controller::class, 'excluirCompra'])->name('Compras.excluir');

Route::match(['get', 'post'], '/Vendas/cadastro', [RF_F02Controller::class, 'cadastrarVenda'])->name('Vendas.cadastro');
Route::post('/Vendas/cadastro', [RF_F02Controller::class, 'buscarProduto'])->name('Vendas.buscar');
Route::post('/Vendas/salvar', [RF_F02Controller::class, 'salvarVenda'])->name('Vendas.salvar');

/* Route::get('/login', [AuthController::class, 'ShowFormlogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware("auth")->group(function(){
    Route::resource('produtos', ProdutoController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
*/
Route::get('/Relatorios/Vendas', [RF_S01Controller::class, 'relatorioVendas'])->name('Relatorios.vendas');