<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RF_B01Controller;
use App\Http\Controllers\RF_B02Controller;
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

Route::get('/Clientes/cadastro',[RF_B02Controller::class,'CadastrarCliente'])->name('Clientes.cadastro');
Route::post('/Clientes/salvar',[RF_B02Controller::class,'SalvarCliente'])->name('Clientes.Salvar');