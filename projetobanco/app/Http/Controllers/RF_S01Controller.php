<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;

class RF_S01Controller extends Controller
{
    public function relatorioVendas()
    {
        $vendas = Venda::with('produto')->get();
        return view('Relatorios.vendas', compact('vendas'));
    }
}
