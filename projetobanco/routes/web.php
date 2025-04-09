<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RF_B01Controller;




use App\Http\Controllers\RF_B03Controller;
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

Route::get('/Produtos/cadastro', [RF_B01Controller::class, 'CadastrarProduto'])->name('Produtos.cadastro');
Route::post('/Produtos/salvar', [RF_B01Controller::class, 'SalvarProduto'])->name('Produtos.salvar');









Route::get('/Funcionarios/gerenciar', [RF_B03Controller::class, 'CadastrarFuncionario'])->name('Funcionarios.gerenciar');
Route::post('/Funcionarios/salvar', [RF_B03Controller::class, 'SalvarFuncionario'])->name('Funcionarios.salvar');