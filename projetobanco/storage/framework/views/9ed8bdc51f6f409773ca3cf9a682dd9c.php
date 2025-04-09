<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedores</title>
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
        background-color: #333;
    }
    button.btn {
            margin-top: 20px;
            width: 310px;
            margin-left: 1045px;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        button.btn:hover {
            background: #0056b3;
        }
</style>
<body>
    <div class="container">
        <h2>Cadastro de Fornecedor</h2>
        <?php if($errors->any()): ?> <!-- Verificar se existe algum erro -->
        <div class="error-messages">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(session('success')): ?> <!-- caso não tenha erro -->
        <p class="success"><?php echo e(session('success')); ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('Fornecedores.salvar')); ?>">
            <?php echo csrf_field(); ?>
            <label for="id">Código:</label>
            <input type="text" id="id" name="id" required>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="documento">Documento(CPF/CNPJ):</label>
            <input type="text" id="documento" name="documento" required>
            <label for="endereco">Endereço(Bairro/Rua/Numero):</label>
            <input type="text " id="endereco" name="endereco" required>
            <label for="produtos_disponiveis">Produtos Disponíveis:</label>
            <input type="text" id="produtos_disponiveis" name="produtos_disponiveis" required>
            <label for="formas_pagamento">Formas de Pagamento:</label>
            <input type="text" id="formas_pagamento" name="formas_pagamento" required>
            <label for="telefone">Telefone:</label>
            <input type="number" id="telefone" name="telefone" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    <h2 class="listar">Lista de fornecedores</h2>
    <table action="<?php echo e(route('Fornecedores.cadastro')); ?>">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Documento (CPF/CNPJ)</th>
            <th>endereco</th>
            <th>Produtos Disponíveis</th>
            <th>Formas de Pagamento</th>
            <th>Gerenciar</th>
        </tr>
        <?php $__currentLoopData = $Fornecedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fornecedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($fornecedor->id); ?></td>
            <td><?php echo e($fornecedor->nome); ?></td>
            <td><?php echo e($fornecedor->documento); ?></td>
            <td><?php echo e($fornecedor->endereco); ?></td>
            <td><?php echo e($fornecedor->produtos_disponiveis); ?></td>
            <td><?php echo e($fornecedor->formas_pagamento); ?></td>
            <td>
                <a href="<?php echo e(route('Fornecedores.editar', $fornecedor->id)); ?>">
                    <button type="button">Editar</button>
                </a>
                <form action="<?php echo e(route('Fornecedores.excluir', $fornecedor->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a href="<?php echo e(route('home')); ?>"><button class="btn">
        Voltar
    </button></a>
</body>

</html><?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Fornecedores/cadastro.blade.php ENDPATH**/ ?>