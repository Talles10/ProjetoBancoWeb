<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Venda</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h1, h2 {
            text-align: center;
        }

        .formulario-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            margin: 0 auto;
            max-width: 600px;
            box-shadow: 0px 0px 10px #ccc;
        }

        .produto-selecionado {
            margin-top: 20px;
            background-color: #eef6ff;
            padding: 20px;
            border-radius: 10px;
        }

        .imagem-decorativa {
            width: 150px;
            height: 150px;
            background-color: #dcdcdc;
            margin: 10px auto;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-style: italic;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"] {
            padding: 8px;
            width: 100%;
            max-width: 200px;
            margin: 10px auto;
            display: block;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .erro {
            background-color: #ffdddd;
            padding: 10px;
            margin-bottom: 10px;
            border-left: 5px solid red;
            color: red;
        }

        .sucesso {
            background-color: #ddffdd;
            padding: 10px;
            margin-bottom: 10px;
            border-left: 5px solid green;
            color: green;
        }

        .btn-voltar {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="formulario-container">
        <h1>Realizar Venda</h1>
        <?php if($errors->any()): ?>
            <div class="erro">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($erro); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="sucesso">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('Vendas.buscar')); ?>">
            <?php echo csrf_field(); ?>
            <label for="produto_id">Digite o ID do Produto:</label>
            <input type="number" name="produto_id" id="produto_id" required>
            <button type="submit">Buscar Produto</button>
        </form>
        <?php if($produtoSelecionado): ?>
            <div class="produto-selecionado">
                <h3><?php echo e($produtoSelecionado->nome); ?></h3>
                <p>Marca: <?php echo e($produtoSelecionado->marca); ?></p>
                <p>Preço: R$ <?php echo e(number_format($produtoSelecionado->preco, 2, ',', '.')); ?></p>
                <p>Estoque disponível: <?php echo e($produtoSelecionado->quantidade); ?></p>
                <div class="imagem-decorativa">
                    Foto Produto
                </div>
                <form method="POST" action="<?php echo e(route('Vendas.salvar')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="produto_id" value="<?php echo e($produtoSelecionado->id); ?>">
                    <label for="quantidade">Quantidade a vender:</label>
                    <input type="number" name="quantidade" id="quantidade" required min="1" max="<?php echo e($produtoSelecionado->quantidade); ?>">
                    <button type="submit">Confirmar Venda</button>
                </form>
            </div>
        <?php endif; ?>
        <div class="btn-voltar">
            <a href="<?php echo e(url('/')); ?>">
                <button type="button">Voltar</button>
            </a>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Vendas/cadastro.blade.php ENDPATH**/ ?>