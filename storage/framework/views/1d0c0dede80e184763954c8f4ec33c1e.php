<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Products</h1>
        <p class="small text-secondary mb-0">Software products shown on the public Products page.</p>
    </div>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add product</a>
</div>

<div class="row g-3">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-1"><?php echo e($p->name); ?></p>
                        <span class="type-badge <?php echo e($p->type); ?>"><?php echo e($p->isSaas() ? 'SaaS' : 'Standalone'); ?></span>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="<?php echo e(route('admin.products.edit', $p)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('admin.products.destroy', $p)); ?>" onsubmit="return confirm('Remove <?php echo e($p->name); ?>?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <?php if($p->tagline): ?><p class="small text-secondary mt-2 mb-0"><?php echo e($p->tagline); ?></p><?php endif; ?>
                <p class="small text-secondary mt-2 mb-0"><?php echo e($p->published ? 'Published' : 'Hidden'); ?> · order <?php echo e($p->sort_order); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/products/index.blade.php ENDPATH**/ ?>