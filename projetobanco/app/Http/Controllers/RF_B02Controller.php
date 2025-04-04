<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Fornecedor;

class RF_B02Controller extends Controller
{   #Clientes
    public function CadastrarCliente(){
        $Clientes = Cliente::all();
        return view('Clientes.cadastro', compact('Clientes'));
    }
    public function SalvarCliente(Request $request){
        $request->validate([
            'id' => 'required|unique:Clientes',
            'nome' => 'required|',
            'documento' => ['required', 'regex:/^\d{11}$|^\d{14}$/'],
            'endereco' => 'required',
        ]);
    
        $cliente = new Cliente();
        $cliente->id = $request->id;
        $cliente->nome = $request->nome;
        $cliente->documento = $request->documento;
        $cliente->endereco = $request->endereco;
        $cliente->save();
        return redirect()->route('Clientes.cadastro');
    }
    public function AtualizarCliente(Request $request, $id){
        $request->validate([
            'nome' => 'required|',
            'documento' => ['required', 'regex:/^\d{11}$|^\d{14}$/'],
            'endereco' => 'required',
        ]);
        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'endereco' => $request->endereco,
        ]);
        return redirect()->route('Clientes.cadastro')->with('success', 'Cliente atualizado com sucesso!');
    }
    public function ListarCliente(){
        $Clientes = Cliente::all();
        var_dump($Clientes);
        return view('Cliente.cadastro', ['Cliente' => $Clientes]);
    }


    #Fornecedores
    public function CadastrarFornecedor(){
        $Fornecedores = Fornecedor::all();
        return view('Fornecedores.cadastro', compact('Fornecedores'));
    }
    public function SalvarFornecedor(Request $request){
        $request->validate([
            'id' => 'required|unique:Fornecedores',
            'nome' => 'required|',
            'documento' => ['required', 'regex:/^\d{11}$|^\d{14}$/'],
            'endereco' => 'required',
            'produtos_disponiveis' => 'required',
            'formas_pagamento' => 'required',
            'telefone' => 'required|regex:/^\d{10,11}$/',
            'email' => 'required|email|unique:Fornecedores,email',
        ]);
    
        $fornecedor = new Fornecedor();
        $fornecedor->id = $request->id;
        $fornecedor->nome = $request->nome;
        $fornecedor->documento = $request->documento;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->produtos_disponiveis = $request->produtos_disponiveis;
        $fornecedor->formas_pagamento = $request->formas_pagamento;
        $fornecedor->telefone = $request->telefone;
        $fornecedor->email = $request->email;
        $fornecedor->save();
        return redirect()->route('Fornecedores.cadastro');
    }
    public function ListarFornecedor(){
        $Fornecedores = Fornecedor::all();
        var_dump($Fornecedores);
        return view('Fornecedores.cadastro', ['Fornecedor' => $Fornecedores]);
    }
    public function AtualizarFornecedor(Request $request, $id){
        $request->validate([
            'nome' => 'required|',
            'documento' => ['required', 'regex:/^\d{11}$|^\d{14}$/'],
            'endereco' => 'required',
            'produtos_disponiveis' => 'required',
            'formas_pagamento' => 'required',
            'telefone' => 'required|regex:/^\d{10,11}$/',
            'email' => 'required|email',
        ]);
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'endereco' => $request->endereco,
            'produtos_disponiveis' => $request->produtos_disponiveis,
            'formas_pagamento' => $request->formas_pagamento,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);
        return redirect()->route('Fornecedores.cadastro')->with('success', 'Fornecedor atualizado com sucesso!');
    }
}