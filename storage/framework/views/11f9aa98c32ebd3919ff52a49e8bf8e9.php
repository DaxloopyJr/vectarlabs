<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Industries</h1>
        <p class="small text-secondary mb-0">Sectors shown on the public Industries pages.</p>
    </div>
    <a href="<?php echo e(route('admin.industries.create')); ?>" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add industry</a>
</div>

<div class="row g-3">
    <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center gap-2">
                        <span class="icon-chip" style="width: 2.2rem; height: 2.2rem; font-size: 1rem;"><i class="bi <?php echo e($ind->iconClass()); ?>"></i></span>
                        <p class="font-display fw-bold text-navy mb-0"><?php echo e($ind->name); ?></p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="<?php echo e(route('admin.industries.edit', $ind)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('admin.industries.destroy', $ind)); ?>" onsubmit="return confirm('Remove <?php echo e($ind->name); ?>?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <?php if($ind->tagline): ?><p class="small text-secondary mt-2 mb-0"><?php echo e($ind->tagline); ?></p><?php endif; ?>
                <p class="small text-secondary mt-2 mb-0"><?php echo e($ind->published ? 'Published' : 'Hidden'); ?> · order <?php echo e($ind->sort_order); ?> · /industries/<?php echo e($ind->slug); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/industries/index.blade.php ENDPATH**/ ?>