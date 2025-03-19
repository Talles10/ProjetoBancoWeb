<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class RF_B02Controller extends Controller
{
    public function CadastrarCliente(){
        $Clientes = Cliente::all();
        return view('Clientes.cadastro', compact('Clientes'));
    }
    public function SalvarCliente(Request $request){
        $request->validate([
            'id' => 'required|unique:Clientes',
            'nome' => 'required|',
            'documento' => 'required|numeric|min:11',
            'endereco' => 'required|',
        ]);
    
        $cliente = new Cliente();
        $cliente->id = $request->id;
        $cliente->nome = $request->nome;
        $cliente->documento = $request->documento;
        $cliente->endereco = $request->endereco;
        $cliente->save();
        return redirect()->route('Clientes.cadastro');
    }
    public function ListarCliente(){
        $Clientes = Cliente::all();
        return view('Cliente.cadastro', ['Cliente' => $Clientes]);
    }
}
