<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Team</h1>
        <p class="small text-secondary mb-0">People shown on the public Team page.</p>
    </div>
    <a href="<?php echo e(route('admin.team.create')); ?>" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add member</a>
</div>

<div class="row g-3">
    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-0"><?php echo e($m->name); ?></p>
                        <p class="text-brand fw-bold text-uppercase mb-0" style="font-size: .68rem; letter-spacing: .1em;"><?php echo e($m->role); ?></p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="<?php echo e(route('admin.team.edit', $m)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('admin.team.destroy', $m)); ?>" onsubmit="return confirm('Remove <?php echo e($m->name); ?>?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <?php if($m->bio): ?><p class="small text-secondary mt-2 mb-0"><?php echo e(Str::limit($m->bio, 120)); ?></p><?php endif; ?>
                <p class="small text-secondary mt-2 mb-0"><?php echo e($m->published ? 'Published' : 'Hidden'); ?> · order <?php echo e($m->sort_order); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/team/index.blade.php ENDPATH**/ ?>