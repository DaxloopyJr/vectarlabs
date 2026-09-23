<?php $__env->startSection('title', 'Our Work — Vectarlabs'); ?>

<?php $__env->startSection('content'); ?>
<?php ($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d)); ?>

<?php echo $__env->make('partials.breadcrumbs', ['crumbs' => [['label' => 'Our Work']], 'dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php echo $__env->make('partials.dark-hero', [
    'badge' => $S('works.hero.badge', 'Proven Delivery'),
    'title1' => $S('works.hero.title1', 'Work that speaks'),
    'title2' => $S('works.hero.title2', 'in results'),
    'tagline' => $S('works.hero.tagline', 'Case studies of platforms we designed, shipped, and still support today — across education, finance, agriculture, health, and enterprise.'),
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker"><?php echo e($S('works.marker', 'Case studies')); ?></p>
        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <a href="<?php echo e(route('works.show', $w->slug)); ?>" class="text-decoration-none">
                        <div class="card-soft hoverable overflow-hidden">
                            <div class="hero-slider d-flex align-items-end justify-content-between p-4" style="padding: 2rem 1.5rem 1.5rem; min-height: 10rem; text-align: left;">
                                <span class="type-badge saas"><?php echo e($w->category); ?></span>
                                <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 2.2rem; height: 2.2rem; border: 1px solid rgba(255,255,255,.2); color: #fff;">
                                    <i class="bi bi-arrow-up-right"></i>
                                </span>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-center small text-secondary">
                                    <span><?php echo e($w->industry); ?></span>
                                    <span><?php echo e($w->year); ?> <?php if($w->featured): ?> · <i class="bi bi-star-fill text-brand"></i> Featured <?php endif; ?></span>
                                </div>
                                <h5 class="font-display fw-bold text-navy mt-2"><?php echo e($w->title); ?></h5>
                                <p class="small text-secondary"><?php echo e($w->summary); ?></p>
                                <span class="small fw-bold text-navy">View case study <i class="bi bi-arrow-right text-brand"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.cta-band', [
    'title1' => 'WANT RESULTS LIKE',
    'title2' => 'THESE?',
    'subtitle' => 'Every project above started with a conversation. Tell us about the system you need.',
    'buttonText' => 'Start Your Project',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/works/index.blade.php ENDPATH**/ ?>