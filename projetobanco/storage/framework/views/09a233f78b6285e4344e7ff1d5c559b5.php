<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<style>
    body {
    background-color: #f0f8ff;
    font-family: Arial, sans-serif;
    text-align: center;
    padding-top: 50px;
}

button.btn {
    padding: 10px 20px;
    margin: 10px;
    background-color: #007BFF;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
}

button.btn:hover {
    background-color: #0056b3;
}

</style>
<body>
    <h1>Página Principal</h1>

    
    <a href="<?php echo e(route('Produtos.cadastro')); ?>">
        <button class="btn">Cadastrar Produto</button>
    </a>

    <a href="<?php echo e(route('Clientes.cadastro')); ?>">
        <button class="btn">Cadastrar Cliente</button>
    </a>
    <a href="<?php echo e(route('Fornecedores.cadastro')); ?>">
        <button class="btn">Cadastrar Fornecedor</button>
    </a>
    <a href="<?php echo e(route('Funcionarios.cadastro')); ?>">
        <button class="btn">Cadastrar Funcionario</button>
    </a>
</body>
</html>
<?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/home.blade.php ENDPATH**/ ?>