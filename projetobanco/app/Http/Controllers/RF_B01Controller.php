<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class RF_B01Controller extends Controller
{
    //
    public function CadastrarProduto(){
        $categorias = Categoria::all(); // Obtém todas as categorias
        $Produtos = Produto::all(); // Obtém todos os produtos
        return view('Produtos.cadastro', compact('categorias','Produtos'));
    }
    public function SalvarProduto(Request $request){
        $request->validate([
            'id' => 'required|unique:Produtos',
            'nome' => 'required',
            'marca' => 'required',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
        ]);

        $categoria = Categoria::firstOrCreate(['nome' => 'Perfumes']);//firstOrCreate retorna a primeira categoria com o nome 'Perfumes' ou cria uma nova categoria com o nome 'Perfumes'


        $produto = new Produto();// Cria um novo produto
        $produto->id = $request->id;
        $produto->nome = $request->nome;
        $produto->marca = $request->marca;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->categoria_id = $categoria->id;
        $produto->save();
        return redirect()->route('Produtos.cadastro');
    }
    public function ListarProdutos(){
        $Produtos = Produto::all();
        return view('Produtos.cadastro', ['Produtos' => $Produtos]);
    }
}
