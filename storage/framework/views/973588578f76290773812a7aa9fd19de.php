<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Dashboard</h1>
        <p class="small text-secondary mb-0">Overview of your website content and inquiries.</p>
    </div>
</div>

<div class="row g-3">
    <?php $__currentLoopData = [
        ['Services', $services, 'tools', route('admin.services.index')],
        ['Industries', $industries, 'building', route('admin.industries.index')],
        ['Products', $products, 'box-seam', route('admin.products.index')],
        ['Projects', $works, 'kanban', route('admin.works.index')],
        ['Team members', $team, 'people', route('admin.team.index')],
        ['Insight articles', $posts, 'file-text', route('admin.posts.index')],
        ['Unread messages', $unread, 'inbox', route('admin.messages.index')],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value, $icon, $link]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-xl-3">
            <a href="<?php echo e($link); ?>" class="text-decoration-none">
                <div class="card-soft hoverable p-4">
                    <div class="d-flex justify-content-between">
                        <span class="text-secondary fw-bold" style="font-size: .68rem; letter-spacing: .14em; text-transform: uppercase;"><?php echo e($label); ?></span>
                        <i class="bi bi-<?php echo e($icon); ?> text-brand"></i>
                    </div>
                    <p class="display-hero text-navy mt-2 mb-0" style="font-size: 2.4rem;"><?php echo e($value); ?></p>
                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="card-soft p-4 mt-4">
    <h5 class="font-display fw-bold text-navy">Latest inquiries</h5>
    <?php $__empty_1 = true; $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="d-flex justify-content-between align-items-center gap-3 py-3 <?php echo e(!$loop->last ? 'border-bottom' : ''); ?>">
            <div class="text-truncate">
                <p class="fw-semibold text-navy small mb-1"><?php echo e($m->name); ?> <span class="fw-normal text-secondary"><?php echo e($m->email); ?></span></p>
                <p class="small text-secondary mb-0 text-truncate"><?php echo e($m->message); ?></p>
            </div>
            <span class="badge rounded-pill <?php echo e($m->read ? 'text-bg-secondary' : 'text-bg-warning'); ?>"><?php echo e($m->read ? 'Read' : 'New'); ?></span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="small text-secondary py-4 mb-0">No contact messages yet.</p>
    <?php endif; ?>
    <a href="<?php echo e(route('admin.messages.index')); ?>" class="small fw-bold text-brand">View all messages →</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>