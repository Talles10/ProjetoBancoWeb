<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relatório de Vendas</h1>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $vendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($venda->produto->nome); ?></td>
                    <td>R$ <?php echo e(number_format($venda->preco_total, 2, ',', '.')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('home')); ?>">
            <button class="btn">Voltar à Home</button>
        </a>
    </div>
</body>
</html><?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Relatorios/vendas.blade.php ENDPATH**/ ?>