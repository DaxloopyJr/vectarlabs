<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Insights</h1>
        <p class="small text-secondary mb-0">Articles shown on the Home and About pages.</p>
    </div>
    <a href="<?php echo e(route('admin.posts.create')); ?>" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> New article</a>
</div>

<div class="card-soft overflow-hidden">
    <table class="table table-hover align-middle mb-0">
        <thead class="small text-secondary text-uppercase">
            <tr><th class="px-4">Title</th><th>Tag</th><th>Status</th><th class="text-end px-4">Actions</th></tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4">
                        <p class="fw-semibold text-navy small mb-0"><?php echo e($p->title); ?></p>
                        <p class="small text-secondary mb-0 text-truncate" style="max-width: 26rem;"><?php echo e($p->excerpt); ?></p>
                    </td>
                    <td><span class="badge rounded-pill text-bg-warning"><?php echo e($p->tag ?: '—'); ?></span></td>
                    <td><span class="badge rounded-pill <?php echo e($p->published ? 'text-bg-success' : 'text-bg-secondary'); ?>"><?php echo e($p->published ? 'Published' : 'Draft'); ?></span></td>
                    <td class="text-end px-4">
                        <a href="<?php echo e(route('admin.posts.edit', $p)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('admin.posts.destroy', $p)); ?>" class="d-inline" onsubmit="return confirm('Delete this article?')">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>