<section class="bg-navy-deep text-center py-5">
    <div class="container py-5">
        <h2 class="display-hero text-white mx-auto" style="max-width: 46rem; font-size: clamp(2rem, 4.5vw, 3rem);">
            <?php echo e($title1); ?> <?php if(!empty($title2)): ?><span class="text-brand"><?php echo e($title2); ?></span><?php endif; ?>
        </h2>
        <?php if(!empty($subtitle)): ?><p class="mx-auto mt-3 text-white-50" style="max-width: 36rem;"><?php echo e($subtitle); ?></p><?php endif; ?>
        <?php if(!empty($buttonText)): ?>
            <a href="<?php echo e(route('contact')); ?>" class="btn-brand mt-4"><?php echo e($buttonText); ?> <i class="bi bi-arrow-right"></i></a>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/cta-band.blade.php ENDPATH**/ ?>