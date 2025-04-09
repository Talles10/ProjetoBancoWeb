<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
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
</style>

<body>
    <div class="container">
        <h2>Cadastro de Funcionários</h2>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('Funcionarios.salvar')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="number" id="id" name="id" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label">CPF</label>
                <input type="number" id="documento" name="documento" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salário</label>
                <input type="number" id="salario" name="salario" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo</label>
                <input type="text" id="cargo" name="cargo" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <h2 class="listar">Lista de Funcionários</h2>
    <table action = "<?php echo e(route('Funcionarios.gerenciar')); ?>">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Salário</th>
            <th>Cargo</th>
            <th>E-mail</th>
        </tr>
        <?php $__currentLoopData = $Funcionarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funcionario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($funcionario->id); ?></td>
            <td><?php echo e($funcionario->nome); ?></td>
            <td><?php echo e($funcionario->documento); ?></td>
            <td>R$ <?php echo e(number_format($funcionario->salario, 2, ',', '.')); ?></td>
            <td><?php echo e($funcionario->cargo); ?></td>
            <td><?php echo e($funcionario->email); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</body>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

</html><?php /**PATH C:\Users\USER\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Funcionarios/gerenciar.blade.php ENDPATH**/ ?>