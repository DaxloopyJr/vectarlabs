<?php ($crumbs = $crumbs ?? []); ?>
<?php if(count($crumbs)): ?>
<div class="breadcrumb-bar <?php echo e(!empty($dark) ? 'on-dark' : ''); ?>">
    <div class="container" style="max-width: 72rem;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <?php $__currentLoopData = $crumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$loop->last && !empty($crumb['url'])): ?>
                        <li class="breadcrumb-item"><a href="<?php echo e($crumb['url']); ?>"><?php echo e($crumb['label']); ?></a></li>
                    <?php else: ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e($crumb['label']); ?></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </nav>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/breadcrumbs.blade.php ENDPATH**/ ?>