<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Vendas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #333;
            margin-bottom: 5px;
        }
        .header p {
            color: #666;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }
        .resumo {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .resumo h2 {
            color: #333;
            margin-top: 0;
        }
        .resumo-item {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Relatório de Vendas</h1>
        <p>Gerado em <?php echo e(\Carbon\Carbon::now()->format('d/m/Y H:i:s')); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Valor Total</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $vendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($venda->id); ?></td>
                <td><?php echo e($venda->produto->nome); ?></td>
                <td><?php echo e($venda->quantidade); ?></td>
                <td>R$ <?php echo e(number_format($venda->produto->preco, 2, ',', '.')); ?></td>
                <td>R$ <?php echo e(number_format($venda->preco_total, 2, ',', '.')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($venda->created_at)->format('d/m/Y H:i')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class="total-row">
                <td colspan="4" style="text-align: right"><strong>Total Geral:</strong></td>
                <td colspan="2"><strong>R$ <?php echo e(number_format($total_geral, 2, ',', '.')); ?></strong></td>
            </tr>
        </tbody>
    </table>

    <div class="resumo">
        <h2>Resumo do Período</h2>
        <div class="resumo-item">
            <strong>Total de Vendas:</strong> <?php echo e($total_vendas); ?>

        </div>
        <div class="resumo-item">
            <strong>Média por Venda:</strong> R$ <?php echo e(number_format($media_vendas, 2, ',', '.')); ?>

        </div>
        <div class="resumo-item">
            <strong>Maior Venda:</strong> R$ <?php echo e(number_format($maior_venda, 2, ',', '.')); ?>

        </div>
    </div>
</body>
</html> <?php /**PATH C:\Users\higor\OneDrive\Documentos\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Relatorios/vendas_pdf.blade.php ENDPATH**/ ?>