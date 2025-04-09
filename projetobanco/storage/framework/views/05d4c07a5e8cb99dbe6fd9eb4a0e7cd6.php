<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Compra</title>
    <style>
        /* Mesmo CSS base usado anteriormente */
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

        input, select {
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
            margin: 30px auto;
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
</head>
<body>
    <div class="container">
        <h2>Cadastro de Compra</h2>
        <?php if($errors->any()): ?>
            <div class="error-messages">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <p class="success"><?php echo e(session('success')); ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('Compras.salvar')); ?>">
            <?php echo csrf_field(); ?>
            <label for="produto_id">Produto:</label>
            <select name="produto_id" id="produto_id" required>
                <option value="">Selecione um Produto</option>
                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($produto->id); ?>"><?php echo e($produto->nome); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" required>
            <label for="preco_total">Preço Total:</label>
            <input type="number" name="preco_total" id="preco_total" step="0.01" required>
            <label for="data_compra">Data da Compra:</label>
            <input type="date" name="data_compra" id="data_compra" required>
            <button type="submit">Cadastrar Compra</button>
        </form>
    </div>
    <h2 class="listar">Lista de Compras</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Total</th>
            <th>Data</th>
            <th>Gerenciar</th>
        </tr>
        <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($compra->id); ?></td>
                <td><?php echo e($compra->produto->nome); ?></td>
                <td><?php echo e($compra->quantidade); ?></td>
                <td>R$ <?php echo e(number_format($compra->preco_total, 2, ',', '.')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y')); ?></td>
                <td>
                    <a href="<?php echo e(route('Compras.editar', $compra->id)); ?>">
                        <button type="button">Editar</button>
                    </a>
                    <form action="<?php echo e(route('Compras.excluir', $compra->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" onclick="return confirm('Deseja excluir esta compra?')">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <a href="<?php echo e(route('home')); ?>"><button class="btn">
        Voltar
    </button></a>
</body>
</html>
<?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Compras/cadastro.blade.php ENDPATH**/ ?>