<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedores</title>
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
    <h2>Editar Produto</h2>

    <form method="POST" action="<?php echo e(route('Fornecedores.atualizar', $fornecedor->id)); ?>">
        <?php echo csrf_field(); ?>
        <label for="id">Código:</label>
        <input type="text" id="id" name="id" value="<?php echo e($fornecedor->id); ?>" required>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo e($fornecedor->nome); ?>" required>

        <label for="documento">Documento(CPF/CNPJ):</label>
        <input type="text" id="documento" name="documento" value="<?php echo e($fornecedor->documento); ?>" required>

        <label for="endereco">Endereço(Bairro/Rua/Numero):</label>
        <input type="text " id="endereco" name="endereco" value="<?php echo e($fornecedor->endereco); ?>" required>

        <label for="produtos_disponiveis">Produtos Disponíveis:</label>
        <input type="list" id="produtos_disponiveis" name="produtos_disponiveis" value="<?php echo e($fornecedor->produtos_disponiveis); ?>" required>

        <label for="formas_pagamento">Formas de Pagamento:</label>
        <input type="text" id="formas_pagamento" name="formas_pagamento" value="<?php echo e($fornecedor->formas_pagamento); ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo e($fornecedor->telefone); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo e($fornecedor->email); ?>" required>

        <button type="submit">Atualizar</button>
    </form>

</body>

</html><?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Fornecedores/editar.blade.php ENDPATH**/ ?>