<section class="hero-dark">
    <div class="container">
        <?php if(!empty($badge)): ?><span class="hero-badge"><?php echo e($badge); ?></span><?php endif; ?>
        <h1 class="display-hero text-white mx-auto mt-4" style="max-width: 56rem; font-size: clamp(2.6rem, 6vw, 4.5rem);">
            <?php echo e($title1); ?><?php if(!empty($title2)): ?><br><span class="text-brand"><?php echo e($title2); ?></span><?php endif; ?>
        </h1>
        <?php if(!empty($tagline)): ?>
            <p class="mx-auto mt-4 text-white-50" style="max-width: 42rem;"><?php echo e($tagline); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/dark-hero.blade.php ENDPATH**/ ?>