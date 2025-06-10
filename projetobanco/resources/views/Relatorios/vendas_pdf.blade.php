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
        <p>Gerado em {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
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
            @foreach($vendas as $venda)
            <tr>
                <td>{{ $venda->id }}</td>
                <td>{{ $venda->produto->nome }}</td>
                <td>{{ $venda->quantidade }}</td>
                <td>R$ {{ number_format($venda->produto->preco, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($venda->preco_total, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($venda->created_at)->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" style="text-align: right"><strong>Total Geral:</strong></td>
                <td colspan="2"><strong>R$ {{ number_format($total_geral, 2, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="resumo">
        <h2>Resumo do Período</h2>
        <div class="resumo-item">
            <strong>Total de Vendas:</strong> {{ $total_vendas }}
        </div>
        <div class="resumo-item">
            <strong>Média por Venda:</strong> R$ {{ number_format($media_vendas, 2, ',', '.') }}
        </div>
        <div class="resumo-item">
            <strong>Maior Venda:</strong> R$ {{ number_format($maior_venda, 2, ',', '.') }}
        </div>
    </div>
</body>
</html> 