

<?php $__env->startSection('title', 'Realizar Venda'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Buscar Produto</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('Vendas.buscar')); ?>" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <label for="produto_id" class="form-label">ID do Produto</label>
                            <input type="number" name="produto_id" id="produto_id" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-2"></i>Buscar
                            </button>
                        </div>
                    </div>
                </form>

                <?php if($produtoSelecionado): ?>
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Produto Encontrado</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px">
                                        <i class="fas fa-box fa-3x text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4><?php echo e($produtoSelecionado->nome); ?></h4>
                                    <p class="mb-2"><strong>Marca:</strong> <?php echo e($produtoSelecionado->marca); ?></p>
                                    <p class="mb-2"><strong>Preço:</strong> R$ <?php echo e(number_format($produtoSelecionado->preco, 2, ',', '.')); ?></p>
                                    <p class="mb-3"><strong>Estoque disponível:</strong> 
                                        <span class="badge bg-info"><?php echo e($produtoSelecionado->quantidade); ?> unidades</span>
                                    </p>

                                    <form method="POST" action="<?php echo e(route('Vendas.salvar')); ?>" class="mt-3">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="produto_id" value="<?php echo e($produtoSelecionado->id); ?>">
                                        <div class="row align-items-end">
                                            <div class="col-md-6">
                                                <label for="quantidade" class="form-label">Quantidade a vender</label>
                                                <input type="number" name="quantidade" id="quantidade" 
                                                    class="form-control" required min="1" 
                                                    max="<?php echo e($produtoSelecionado->quantidade); ?>"
                                                    oninput="calcularTotal(this.value, <?php echo e($produtoSelecionado->preco); ?>)">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="total" class="form-label">Total da Venda</label>
                                                <input type="text" id="total" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100 mt-3">
                                            <i class="fas fa-check-circle me-2"></i>Confirmar Venda
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function calcularTotal(quantidade, preco) {
    const total = quantidade * preco;
    document.getElementById('total').value = 'R$ ' + total.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

$(document).ready(function() {
    // Inicializa máscaras e outros comportamentos
    $('.money').mask('#.##0,00', {reverse: true});
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.financeiro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\GitHub\ProjetoBancoWeb\projetobanco\resources\views/Vendas/cadastro.blade.php ENDPATH**/ ?>