@extends('layouts.app')

@section('title', 'Cadastro de Fornecedores')

@section('page-title', 'Cadastro de Fornecedores')
@section('page-description', 'Gerencie o cadastro de fornecedores')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('Fornecedores.salvar') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="nome">Nome/Razão Social</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="documento">CNPJ/CPF</label>
            <input type="text" class="form-control" id="documento" name="documento" maxlength="18" required>
            <small class="form-text text-muted">Digite apenas números (11 dígitos para CPF ou 14 para CNPJ)</small>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" maxlength="15" required>
            <small class="form-text text-muted">Digite apenas números (DDD + número)</small>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>

        <div class="form-group">
            <label for="produtos_disponiveis">Produtos Disponíveis</label>
            <textarea class="form-control" id="produtos_disponiveis" name="produtos_disponiveis" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="formas_pagamento">Formas de Pagamento</label>
            <textarea class="form-control" id="formas_pagamento" name="formas_pagamento" rows="3" required></textarea>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                        <th>CNPJ/CPF</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Produtos</th>
                        <th>Pagamentos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ formatarDocumento($fornecedor->documento) }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td>{{ formatarTelefone($fornecedor->telefone) }}</td>
                            <td>{{ $fornecedor->endereco }}</td>
                            <td>{{ $fornecedor->produtos_disponiveis }}</td>
                            <td>{{ $fornecedor->formas_pagamento }}</td>
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
    // Função para aplicar máscara de CPF/CNPJ
    function mascaraDocumento(valor) {
        valor = valor.replace(/\D/g, '');
        if (valor.length <= 11) {
            // CPF
            valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
            valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
            valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        } else {
            // CNPJ
            valor = valor.replace(/^(\d{2})(\d)/, '$1.$2');
            valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            valor = valor.replace(/\.(\d{3})(\d)/, '.$1/$2');
            valor = valor.replace(/(\d{4})(\d)/, '$1-$2');
        }
        return valor;
    }

    // Função para aplicar máscara de telefone
    function mascaraTelefone(valor) {
        valor = valor.replace(/\D/g, '');
        if (valor.length <= 11) {
            if (valor.length <= 10) {
                // Telefone fixo
                valor = valor.replace(/(\d{2})(\d)/, '($1) $2');
                valor = valor.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                // Celular
                valor = valor.replace(/(\d{2})(\d)/, '($1) $2');
                valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
            }
        }
        return valor;
    }

    // Aplicar máscaras nos campos
    document.getElementById('documento').addEventListener('input', function(e) {
        e.target.value = mascaraDocumento(e.target.value);
    });

    document.getElementById('telefone').addEventListener('input', function(e) {
        e.target.value = mascaraTelefone(e.target.value);
    });
</script>
@endsection

@php
function formatarDocumento($documento) {
    $doc = preg_replace('/[^0-9]/', '', $documento);
    if (strlen($doc) === 11) {
        return substr($doc, 0, 3) . '.' . substr($doc, 3, 3) . '.' . substr($doc, 6, 3) . '-' . substr($doc, 9);
    } else {
        return substr($doc, 0, 2) . '.' . substr($doc, 2, 3) . '.' . substr($doc, 5, 3) . '/' . substr($doc, 8, 4) . '-' . substr($doc, 12);
    }
}

function formatarTelefone($telefone) {
    $tel = preg_replace('/[^0-9]/', '', $telefone);
    if (strlen($tel) === 11) {
        return '(' . substr($tel, 0, 2) . ') ' . substr($tel, 2, 5) . '-' . substr($tel, 7);
    } else {
        return '(' . substr($tel, 0, 2) . ') ' . substr($tel, 2, 4) . '-' . substr($tel, 6);
    }
}
@endphp