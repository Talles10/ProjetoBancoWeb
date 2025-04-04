<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clientes</title>
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

    .listar {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
        text-align: left;
    }

    input,
    select {
        position: relative;
        /* Torna o z-index funcional */
        z-index: 10;
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    button {
        margin-top: 20px;
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

    th,
    td {
        border: 1px solid #1e90ff;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #1e90ff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: rgb(255, 255, 255);
    }

    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .error-messages ul {
        color: red;
        list-style-type: none;
    }

    .success {
        color: green;
    }
</style>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST" action="{{ route('Clientes.atualizar', $cliente->id) }}">
    @csrf
    <label for="id">Código:</label>
    <input type="text" id="id" name="id" value="{{ $cliente->id }}" readonly>

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome', $cliente->nome) }}" required>

    <label for="documento">Documento (CPF/CNPJ):</label>
    <input type="text" id="documento" name="documento" value="{{ old('documento', $cliente->documento) }}" required>

    <label for="endereco">Endereço (Bairro/Rua/Número):</label>
    <input type="text" id="endereco" name="endereco" value="{{ old('endereco', $cliente->endereco) }}" required>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>