<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;

class RF_S01Controller extends Controller
{
    public function relatorioVendas(Request $request)
    {
        $query = Venda::with('produto');

        // Aplicar filtros se existirem
        if ($request->data_inicio) {
            $query->whereDate('created_at', '>=', $request->data_inicio);
        }
        if ($request->data_fim) {
            $query->whereDate('created_at', '<=', $request->data_fim);
        }

        $vendas = $query->get();
        return view('Relatorios.vendas', compact('vendas'));
    }

    public function gerarPDF(Request $request)
    {
        $query = Venda::with('produto');

        // Aplicar os mesmos filtros do relatório
        if ($request->data_inicio) {
            $query->whereDate('created_at', '>=', $request->data_inicio);
        }
        if ($request->data_fim) {
            $query->whereDate('created_at', '<=', $request->data_fim);
        }

        $vendas = $query->get();
        
        $pdf = PDF::loadView('Relatorios.vendas_pdf', [
            'vendas' => $vendas,
            'total_vendas' => $vendas->count(),
            'media_vendas' => $vendas->avg('preco_total'),
            'maior_venda' => $vendas->max('preco_total'),
            'total_geral' => $vendas->sum('preco_total')
        ]);

        return $pdf->download('relatorio-vendas.pdf');
    }
}
