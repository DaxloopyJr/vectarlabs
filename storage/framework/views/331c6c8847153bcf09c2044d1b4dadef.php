<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Messages</h1>
    <p class="small text-secondary mb-0">Inquiries submitted through the Contact page form.</p>
</div>

<div class="d-grid gap-3">
    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card-soft p-4 <?php echo e($m->read ? '' : 'border-warning'); ?>">
            <div class="d-flex flex-wrap justify-content-between gap-2">
                <div>
                    <p class="font-display fw-bold text-navy mb-0">
                        <?php echo e($m->name); ?>

                        <?php if (! ($m->read)): ?><span class="badge rounded-pill text-bg-warning ms-1">New</span><?php endif; ?>
                    </p>
                    <p class="small text-secondary mb-0"><?php echo e($m->email); ?><?php echo e($m->company ? ' · '.$m->company : ''); ?><?php echo e($m->subject ? ' · '.$m->subject : ''); ?></p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="small text-secondary"><?php echo e($m->created_at->format('M j, Y H:i')); ?></span>
                    <?php if (! ($m->read)): ?>
                        <form method="POST" action="<?php echo e(route('admin.messages.read', $m)); ?>">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-outline-secondary" title="Mark as read"><i class="bi bi-envelope-open"></i></button>
                        </form>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('admin.messages.destroy', $m)); ?>" onsubmit="return confirm('Delete this message?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
            <p class="small text-navy mt-3 mb-0" style="white-space: pre-wrap;"><?php echo e($m->message); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="card-soft p-5 text-center small text-secondary">No messages yet.</div>
    <?php endif; ?>
</div>

<div class="mt-4"><?php echo e($messages->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>