<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Services</h1>
        <p class="small text-secondary mb-0">Each published service gets its own dynamic detail page.</p>
    </div>
    <a href="<?php echo e(route('admin.services.create')); ?>" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> New service</a>
</div>

<div class="card-soft overflow-hidden">
    <table class="table table-hover align-middle mb-0">
        <thead class="small text-secondary text-uppercase">
            <tr><th class="px-4">Service</th><th class="d-none d-md-table-cell">Slug</th><th>Cards</th><th>Status</th><th class="text-end px-4">Actions</th></tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4">
                        <p class="fw-semibold text-navy small mb-0"><?php echo e($s->title_line1); ?> <?php echo e($s->title_line2); ?></p>
                        <p class="small text-secondary mb-0 text-truncate" style="max-width: 22rem;"><?php echo e($s->summary); ?></p>
                    </td>
                    <td class="d-none d-md-table-cell"><code class="small">/services/<?php echo e($s->slug); ?></code></td>
                    <td class="small"><?php echo e($s->cards_count); ?></td>
                    <td><span class="badge rounded-pill <?php echo e($s->published ? 'text-bg-success' : 'text-bg-secondary'); ?>"><?php echo e($s->published ? 'Published' : 'Draft'); ?></span></td>
                    <td class="text-end px-4">
                        <a href="<?php echo e(route('admin.services.edit', $s)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('admin.services.destroy', $s)); ?>" class="d-inline" onsubmit="return confirm('Delete this service?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/services/index.blade.php ENDPATH**/ ?>