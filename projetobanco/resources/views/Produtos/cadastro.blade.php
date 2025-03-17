<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }
    .container {
        width: 350px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 10px;
        background: #f4f4f4;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    h2 {
        margin-bottom: 20px;
        color: #333;
    }
    .listar{
        display: flex;
        justify-content: center;
    }
    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
        text-align: left;
    }
    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s ease;
    }

    button:hover {
        background: #0056b3;
    }
    table {

            width: 80%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 255, 0.2);
            margin-left: 100px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #1e90ff;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #1e90ff;
            color: white;
        }
        tr:nth-child(even) {
            background-color:rgb(255, 255, 255);
        }
        tr:nth-child(odd) {
            background-color: #333;
        }
</style>

<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        @if($errors->any()) <!-- Verificar se existe algum erro -->
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success')) <!-- caso não tenha erro -->
        <p class="success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('Produtos.salvar') }}">
            @csrf

            <label for="id">Código:</label>
            <input type="text" id="id" name="id" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <label for="categoria_id">Categoria:</label>
            <input type="text" id="categoria_id" name="categoria_id">
            <select name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
    <h2 class="listar">Lista de Produtos</h2>
    <table action="{{ route('Produtos.cadastro') }}">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Categoria</th>
        </tr>
        @foreach ($Produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->marca }}</td>
            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td>{{ $produto->categoria->nome }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>