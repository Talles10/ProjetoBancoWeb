<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('fornecedor')->get();
        $fornecedores = Fornecedor::all();
        return view('Produtos.cadastro', compact('produtos', 'fornecedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ]);

        Produto::create($request->all());

        return redirect()->route('Produtos.cadastro')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $fornecedores = Fornecedor::all();
        return view('Produtos.editar', compact('produto', 'fornecedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('Produtos.cadastro')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('Produtos.cadastro')
            ->with('success', 'Produto excluído com sucesso!');
    }
} 