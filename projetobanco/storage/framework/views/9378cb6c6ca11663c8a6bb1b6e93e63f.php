

<?php $__env->startSection('title', 'Editar Produto'); ?>

<?php $__env->startSection('page-title', 'Editar Produto'); ?>
<?php $__env->startSection('page-description', 'Atualize as informações do produto'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('Produtos.atualizar', $produto->id)); ?>" method="POST" class="form">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo e($produto->nome); ?>" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo e($produto->descricao); ?></textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="<?php echo e($produto->preco); ?>" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade em Estoque</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo e($produto->quantidade); ?>" required>
        </div>

        <div class="form-group">
            <label for="fornecedor_id">Fornecedor</label>
            <select class="form-control" id="fornecedor_id" name="fornecedor_id" required>
                <option value="">Selecione um fornecedor</option>
                <?php $__currentLoopData = $fornecedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fornecedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($fornecedor->id); ?>" <?php echo e($produto->fornecedor_id == $fornecedor->id ? 'selected' : ''); ?>>
                        <?php echo e($fornecedor->nome); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i>
                Atualizar Produto
            </button>
            
            <a href="<?php echo e(route('Produtos.cadastro')); ?>" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                Voltar
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Produtos/editar.blade.php ENDPATH**/ ?>