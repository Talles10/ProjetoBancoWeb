<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Produto;

class RF_F01Controller extends Controller
{
    public function cadastrarCompra()
    {
        $produtos = Produto::all();
        $compras = Compra::with('produto')->get();
        return view('Compras.cadastro', ['produtos' => $produtos, 'compras' => $compras]);
    }

    public function salvarCompra(Request $request)
    {
        $request->validate([
            'produto_id'   => 'required|exists:produtos,id',
            'quantidade'   => 'required|integer|min:1',
            'preco_total'  => 'required|numeric|min:0',
            'data_compra'  => 'required|date',
        ]);
        Compra::create([
            'produto_id'  => $request->produto_id,
            'quantidade'  => $request->quantidade,
            'preco_total' => $request->preco_total,
            'data_compra' => $request->data_compra,
        ]);
        $produto = Produto::find($request->produto_id);
        if ($produto) {
            $produto->quantidade += $request->quantidade;
            $produto->save();
        }
        return redirect()->route('Compras.cadastro')->with('success', 'Compra registrada com sucesso!');
    }
    public function editarCompra($id)
    {
        $compra = Compra::findOrFail($id);
        $produtos = Produto::all();
        return view('Compras.editar', compact('compra', 'produtos'));
    }
    public function atualizarCompra(Request $request, $id)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'preco_total' => 'required|numeric|min:0',
            'data_compra' => 'required|date',
        ]);
        $compra = Compra::findOrFail($id);
        $compra->update([
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco_total' => $request->preco_total,
            'data_compra' => $request->data_compra,
        ]);
        return redirect()->route('Compras.cadastro')->with('success', 'Compra atualizada com sucesso!');
    }
    public function excluirCompra($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();
        return redirect()->route('Compras.cadastro')->with('success', 'Compra excluída com sucesso!');
    }
}
