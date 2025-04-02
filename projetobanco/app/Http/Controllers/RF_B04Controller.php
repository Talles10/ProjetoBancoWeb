<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;



class RF_B04Controller extends Controller
{
    public function ExcluirProduto($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete(); 
        return redirect()->route('Produtos.cadastro')->with('success', 'Produto excluído com sucesso!');
    }

    public function EditarProduto($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        
        return view('Produtos.editar', compact('produto', 'categorias'));
    }
    
}
