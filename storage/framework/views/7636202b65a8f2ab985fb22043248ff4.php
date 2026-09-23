<?php ($logoUrl = \App\Models\Setting::get('site.logo')); ?>
<?php if($logoUrl): ?>
    <img src="<?php echo e($logoUrl); ?>" alt="<?php echo e(\App\Models\Setting::get('seo.site_name', 'Vectarlabs')); ?>" style="height: <?php echo e($height ?? 34); ?>px; width: auto;">
<?php else: ?>
    <span class="logo-mark" <?php if(!empty($height)): ?> style="width: <?php echo e($height); ?>px; height: <?php echo e($height); ?>px;" <?php endif; ?>>V</span>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/logo.blade.php ENDPATH**/ ?>