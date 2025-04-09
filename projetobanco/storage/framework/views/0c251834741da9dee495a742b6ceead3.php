<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Venda</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<style>
    body {
        background-color: #f0f8ff;
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 50px;
    }

    h1 {
        margin-bottom: 30px;
    }

    form {
        display: inline-block;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: left;
    }

    label {
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin: 10px 0 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn {
        padding: 10px 20px;
        margin: 10px 5px;
        background-color: #007BFF;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        font-weight: bold;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

<body>
    <h1>Cadastro de Venda</h1>

    <?php if(session('success')): ?>
    <div style="color: green"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div style="color: red"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('Vendas.salvar')); ?>">
        <?php echo csrf_field(); ?>

        <label>Produto:</label>
        <select name="produto_id">
            <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($produto->id); ?>"><?php echo e($produto->nome); ?> (<?php echo e($produto->quantidade); ?> em estoque)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="1"><br><br>

        <label>Preço Total:</label>
        <input type="number" name="preco_total" step="0.01"><br><br>

        <label>Data da Venda:</label>
        <input type="date" name="data_venda"><br><br>

        <button type="submit" class="btn">Salvar</button>
    </form>

    <br>
    <a href="<?php echo e(url('/')); ?>">
        <button class="btn">Voltar</button>
    </a>
</body>

</html><?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/vendas/cadastro.blade.php ENDPATH**/ ?>