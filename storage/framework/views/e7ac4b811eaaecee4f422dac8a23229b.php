<?php $__env->startSection('title', 'Industries — Vectarlabs'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.dark-hero', [
    'badge' => 'Industries We Serve',
    'title1' => 'Deep expertise in',
    'title2' => 'your sector.',
    'tagline' => 'From classrooms to cooperatives, clinics to checkout counters — we build software shaped by the realities of each industry we serve.',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Industries we serve</p>
        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <a href="<?php echo e(route('industries.show', $ind->slug)); ?>" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <span class="icon-chip mb-3"><i class="bi <?php echo e($ind->iconClass()); ?>"></i></span>
                            <h5 class="font-display fw-bold text-navy"><?php echo e($ind->name); ?></h5>
                            <p class="text-brand fw-semibold small mb-2"><?php echo e($ind->tagline); ?></p>
                            <p class="small text-secondary"><?php echo e($ind->summary); ?></p>
                            <span class="small fw-bold text-navy">Explore solutions <i class="bi bi-arrow-right text-brand"></i></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.cta-band', [
    'title1' => 'YOUR INDUSTRY',
    'title2' => 'NOT LISTED?',
    'subtitle' => "If you run operations, we can digitize them. Tell us about your sector and we'll show you what's possible.",
    'buttonText' => 'Start the Conversation',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/industries/index.blade.php ENDPATH**/ ?>