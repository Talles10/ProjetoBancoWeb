<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class RF_B03Controller extends Controller
{
    public function CadastrarFuncionario()
    {
        $Funcionarios = Funcionario::all();
        return view('Funcionarios.cadastro', compact('Funcionarios'));
    }
    public function SalvarFuncionario(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:Funcionarios',
            'nome' => 'required',
            'documento' => 'required|unique:Funcionarios,documento',
            'salario' => 'required|numeric|min:0',
            'cargo' => 'required|string|min:3',
            'email' => 'required|email|unique:Funcionarios,email',
        ]);

        $funcionario = new Funcionario();
        $funcionario->id = $request->id;
        $funcionario->nome = $request->nome;
        $funcionario->documento = $request->documento;
        $funcionario->salario = $request->salario;
        $funcionario->cargo = $request->cargo;
        $funcionario->email = $request->email;
        $funcionario->save();
        return redirect()->route('Funcionarios.cadastro')->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function ListarFuncionario()
    {
        $Funcionarios = Funcionario::all();
        return view('Funcionarios.cadastro', ['Funcionarios' => $Funcionarios]);
    }
    public function AtualizarFuncionario(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'documento' => 'required|unique:Funcionarios,documento,' . $id,
            'salario' => 'required|numeric|min:0',
            'cargo' => 'required|string|min:3',
            'email' => 'required|email|unique:Funcionarios,email,' . $id,
        ]);

        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'salario' => $request->salario,
            'cargo' => $request->cargo,
            'email' => $request->email,
        ]);
        return redirect()->route('Funcionarios.cadastro')->with('success', 'Funcionário atualizado com sucesso!');
    }
}
