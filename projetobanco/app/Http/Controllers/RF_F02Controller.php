<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;

class RF_F02Controller extends Controller
{
    public function cadastrarVenda(Request $request)
    {
        $produtoSelecionado = null;

        if ($request->isMethod('post')) {
            $request->validate([
                'produto_id' => 'required|exists:Produtos,id',
            ]);
            $produtoSelecionado = Produto::find($request->produto_id);
        }

        return view('Vendas.cadastro', compact('produtoSelecionado'));
    }
    public function salvarVenda(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:Produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);
        $produto = Produto::find($request->produto_id);
        if (!$produto || $produto->quantidade < $request->quantidade) {
            return redirect()->back()->withErrors(['erro' => 'Produto sem estoque suficiente.']);
        }
        $precoTotal = $produto->preco * $request->quantidade;
        Venda::create([
            'produto_id' => $produto->id,
            'quantidade' => $request->quantidade,
            'preco_total' => $precoTotal,
        ]);
        $produto->quantidade -= $request->quantidade;
        $produto->save();
        return redirect()->route('Vendas.cadastro')->with('success', 'Venda realizada com sucesso!');

    }
    public function buscarProduto(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:Produtos,id',
        ]);

        $produtoSelecionado = Produto::find($request->produto_id);

        return view('Vendas.cadastro', compact('produtoSelecionado'));
    }
}
