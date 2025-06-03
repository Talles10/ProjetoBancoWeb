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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutosController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/Produtos/cadastro', [ProdutosController::class, 'index'])->name('Produtos.cadastro');
Route::post('/Produtos/salvar', [ProdutosController::class, 'store'])->name('Produtos.salvar');
Route::get('/Produtos/editar/{id}', [ProdutosController::class, 'edit'])->name('Produtos.editar');
Route::put('/Produtos/atualizar/{id}', [ProdutosController::class, 'update'])->name('Produtos.atualizar');
Route::delete('/Produtos/excluir/{id}', [ProdutosController::class, 'destroy'])->name('Produtos.excluir');

Route::get('/Clientes/cadastro',[RF_B02Controller::class,'CadastrarCliente'])->name('Clientes.cadastro');
Route::post('/Clientes/salvar',[RF_B02Controller::class,'SalvarCliente'])->name('Clientes.Salvar');
Route::get('/Clientes/editar/{id}', [RF_B04Controller::class, 'EditarCliente'])->name('Clientes.editar');
Route::put('/Clientes/atualizar/{id}', [RF_B02Controller::class, 'AtualizarCliente'])->name('Clientes.atualizar');
Route::delete('/Clientes/excluir/{id}', [RF_B04Controller::class, 'ExcluirCliente'])->name('Clientes.excluir');

Route::get('/Fornecedores/cadastro', [RF_B02Controller::class, 'CadastrarFornecedor'])->name('Fornecedores.cadastro');
Route::post('/Fornecedores/salvar', [RF_B02Controller::class, 'SalvarFornecedor'])->name('Fornecedores.salvar');
Route::get('/Fornecedores/editar/{id}', [RF_B04Controller::class, 'EditarFornecedor'])->name('Fornecedores.editar');
Route::put('/Fornecedores/atualizar/{id}', [RF_B02Controller::class, 'AtualizarFornecedor'])->name('Fornecedores.atualizar');
Route::delete('/Fornecedores/excluir/{id}', [RF_B04Controller::class, 'ExcluirFornecedor'])->name('Fornecedores.excluir');

Route::get('/Funcionarios/cadastro', [RF_B03Controller::class, 'CadastrarFuncionario'])->name('Funcionarios.cadastro');
Route::post('/Funcionarios/salvar', [RF_B03Controller::class, 'SalvarFuncionario'])->name('Funcionarios.salvar');
Route::get('/Funcionarios/editar/{id}', [RF_B04Controller::class, 'EditarFuncionario'])->name('Funcionarios.editar');
Route::put('/Funcionarios/atualizar/{id}', [RF_B03Controller::class, 'AtualizarFuncionario'])->name('Funcionarios.atualizar');
Route::delete('/Funcionarios/excluir/{id}', [RF_B04Controller::class, 'ExcluirFuncionario'])->name('Funcionarios.excluir');


Route::get('/Compras/cadastro', [RF_F01Controller::class, 'cadastrarCompra'])->name('Compras.cadastro');
Route::post('/Compras/salvar', [RF_F01Controller::class, 'salvarCompra'])->name('Compras.salvar');
Route::get('/Compras/{id}/editar', [RF_F01Controller::class, 'editarCompra'])->name('Compras.editar');
Route::put('/Compras/{id}/atualizar', [RF_F01Controller::class, 'atualizarCompra'])->name('Compras.atualizar');
Route::delete('/Compras/{id}/excluir', [RF_F01Controller::class, 'excluirCompra'])->name('Compras.excluir');

Route::match(['get', 'post'], '/Vendas/cadastro', [RF_F02Controller::class, 'cadastrarVenda'])->name('Vendas.cadastro');
Route::post('/Vendas/cadastro', [RF_F02Controller::class, 'buscarProduto'])->name('Vendas.buscar');
Route::post('/Vendas/salvar', [RF_F02Controller::class, 'salvarVenda'])->name('Vendas.salvar');

// Rotas de Autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    // Adicione aqui outras rotas que precisam de autenticação
});

Route::get('/Relatorios/Vendas', [RF_S01Controller::class, 'relatorioVendas'])->name('Relatorios.vendas');