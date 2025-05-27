@extends('layouts.app')

@section('title', 'Cadastro de Funcionários')

@section('page-title', 'Cadastro de Funcionários')
@section('page-description', 'Gerencie o cadastro de funcionários')

@section('content')
    <form action="{{ route('Funcionarios.salvar') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="nome">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>

        <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" required>
        </div>

        <div class="form-group">
            <label for="salario">Salário</label>
            <input type="number" class="form-control" id="salario" name="salario" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="data_admissao">Data de Admissão</label>
            <input type="date" class="form-control" id="data_admissao" name="data_admissao" required>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i>
                Salvar Funcionário
            </button>
            
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
    </form>

    @if(isset($funcionarios) && count($funcionarios) > 0)
        <div class="table-responsive" style="margin-top: 2rem;">
            <h3 style="margin-bottom: 1rem;">Funcionários Cadastrados</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Cargo</th>
                        <th>Data Admissão</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->cpf }}</td>
                            <td>{{ $funcionario->cargo }}</td>
                            <td>{{ date('d/m/Y', strtotime($funcionario->data_admissao)) }}</td>
                            <td>{{ $funcionario->telefone }}</td>
                            <td style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('Funcionarios.editar', $funcionario->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('Funcionarios.excluir', $funcionario->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

@section('scripts')
<script>
    // Máscara para CPF
    document.getElementById('cpf').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
            e.target.value = value;
        }
    });

    // Máscara para telefone
    document.getElementById('telefone').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            value = value.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
            e.target.value = value;
        }
    });

    // Formatação do salário
    document.getElementById('salario').addEventListener('input', function (e) {
        let value = e.target.value;
        if (value.length > 0) {
            value = parseFloat(value).toFixed(2);
            e.target.value = value;
        }
    });
</script>
@endsection