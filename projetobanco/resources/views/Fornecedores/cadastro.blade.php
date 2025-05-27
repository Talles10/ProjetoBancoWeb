@extends('layouts.app')

@section('title', 'Cadastro de Fornecedores')

@section('page-title', 'Cadastro de Fornecedores')
@section('page-description', 'Gerencie o cadastro de fornecedores')

@section('content')
    <form action="{{ route('Fornecedores.salvar') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="nome">Nome/Razão Social</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
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
            <label for="contato">Nome do Contato</label>
            <input type="text" class="form-control" id="contato" name="contato" required>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i>
                Salvar Fornecedor
            </button>
            
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
    </form>

    @if(isset($fornecedores) && count($fornecedores) > 0)
        <div class="table-responsive" style="margin-top: 2rem;">
            <h3 style="margin-bottom: 1rem;">Fornecedores Cadastrados</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome/Razão Social</th>
                        <th>CNPJ</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Contato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->cnpj }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td>{{ $fornecedor->telefone }}</td>
                            <td>{{ $fornecedor->contato }}</td>
                            <td style="display: flex; gap: 0.5rem;">
                                <a href="{{ route('Fornecedores.editar', $fornecedor->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('Fornecedores.excluir', $fornecedor->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">
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
    // Máscara para CNPJ
    document.getElementById('cnpj').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 14) {
            value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
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
</script>
@endsection