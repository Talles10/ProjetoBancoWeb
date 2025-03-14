<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RF_B01Controller;
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