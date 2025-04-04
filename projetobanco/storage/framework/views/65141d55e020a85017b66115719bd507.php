<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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

    <form method="POST" action="<?php echo e(route('Produtos.atualizar', $produto->id)); ?>">
    <?php echo csrf_field(); ?>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo e($produto->nome); ?>" required>

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" value="<?php echo e($produto->marca); ?>" required>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" step="0.01" value="<?php echo e($produto->preco); ?>" required>

    <label for="quantidade">Quantidade:</label>
    <input type="number" id="quantidade" name="quantidade" value="<?php echo e($produto->quantidade); ?>" required>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" id="categoria_id" required>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($categoria->id); ?>" 
                <?php echo e($produto->categoria_id == $categoria->id ? 'selected' : ''); ?>>
                <?php echo e($categoria->nome); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
<?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Produtos/editar.blade.php ENDPATH**/ ?>