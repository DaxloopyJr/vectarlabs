<?php $__env->startSection('content'); ?>
<?php ($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d)); ?>

<?php echo $__env->make('partials.breadcrumbs', ['crumbs' => [['label' => 'Services']], 'dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php echo $__env->make('partials.dark-hero', [
    'badge' => $S('services.hero.badge', 'What We Do'),
    'title1' => $S('services.hero.title1', 'Our'),
    'title2' => $S('services.hero.title2', 'services'),
    'tagline' => $S('services.hero.tagline', 'End-to-end digital engineering — from product strategy and design to software development, cloud infrastructure, and managed support.'),
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker"><?php echo e($S('services.marker', 'Service Catalog')); ?></p>
        <h2 class="display-hero text-navy mt-3" style="max-width: 42rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem); text-transform: none;"><?php echo e($S('services.title', 'Four practices. One accountable engineering partner.')); ?></h2>

        <div class="d-grid gap-4 mt-5">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('services.show', $s->slug)); ?>" class="text-decoration-none">
                    <div class="card-soft hoverable p-4 p-md-5 d-flex flex-column flex-lg-row align-items-lg-center gap-4">
                        <div class="display-hero" style="font-size: 2rem; color: rgba(255,107,26,.25);"><?php echo e(str_pad($i + 1, 2, '0', STR_PAD_LEFT)); ?></div>
                        <div class="flex-grow-1">
                            <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .2em; text-transform: uppercase;"><?php echo e($s->badge); ?></span>
                            <h3 class="font-display fw-black text-navy text-capitalize mt-1" style="font-weight: 900;"><?php echo e(strtolower($s->title_line1.' '.$s->title_line2)); ?></h3>
                            <p class="small text-secondary mb-0" style="max-width: 42rem;"><?php echo e($s->summary); ?></p>
                        </div>
                        <span class="font-display fw-bold text-brand text-uppercase" style="font-size: .78rem; letter-spacing: .14em;">
                            View service <i class="bi bi-arrow-up-right"></i>
                        </span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.cta-band', [
    'title1' => 'NOT SURE WHICH SERVICE',
    'title2' => 'FITS YOUR NEEDS?',
    'subtitle' => "Book a free technical consultation and we'll map your requirements to the right engineering practice.",
    'buttonText' => 'Talk to an Engineer',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/services/index.blade.php ENDPATH**/ ?>