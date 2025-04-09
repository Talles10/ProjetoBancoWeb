<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Compra</title>
    <style>
        /* Mesmo CSS usado nas outras páginas */
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

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            text-align: left;
        }

        input,
        select {
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
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #218838;
        }

        .voltar {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .voltar:hover {
            text-decoration: underline;
        }

        .error-messages ul {
            color: red;
            list-style-type: none;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Compra</h2>
        <?php if($errors->any()): ?>
        <div class="error-messages">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('Compras.atualizar', $compra->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <label for="produto_id">Produto:</label>
            <select name="produto_id" id="produto_id" required>
                <option value="">Selecione um Produto</option>
                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($produto->id); ?>" <?php echo e($compra->produto_id == $produto->id ? 'selected' : ''); ?>>
                    <?php echo e($produto->nome); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" value="<?php echo e($compra->quantidade); ?>" required>
            <label for="preco_total">Preço Total:</label>
            <input type="number" name="preco_total" id="preco_total" step="0.01" value="<?php echo e($compra->preco_total); ?>" required>
            <label for="data_compra">Data da Compra:</label>
            <input type="date" name="data_compra" id="data_compra" value="<?php echo e($compra->data_compra); ?>" required>
            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="<?php echo e(route('Compras.cadastro')); ?>" class="voltar">← Voltar ao Cadastro</a>
    </div>
</body>
</html><?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Compras/editar.blade.php ENDPATH**/ ?>