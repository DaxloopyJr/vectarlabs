<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.dark-hero', [
    'badge' => 'The People Behind The Platforms',
    'title1' => 'MEET THE',
    'title2' => 'TEAM',
    'tagline' => 'A compact senior team of engineers, designers, and cloud specialists — every project led directly by the people who build it.',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Leadership &amp; Engineering</p>
        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card-soft p-4">
                        <?php if($m->photo_url): ?>
                            <img src="<?php echo e($m->photo_url); ?>" alt="<?php echo e($m->name); ?>" class="rounded-4" style="width: 64px; height: 64px; object-fit: cover;">
                        <?php else: ?>
                            <span class="avatar-initials <?php echo e($i % 2 ? 'alt' : ''); ?>"><?php echo e($m->initials()); ?></span>
                        <?php endif; ?>
                        <h5 class="font-display fw-bold text-navy mt-3 mb-0"><?php echo e($m->name); ?></h5>
                        <p class="text-brand fw-bold text-uppercase mb-2" style="font-size: .72rem; letter-spacing: .12em;"><?php echo e($m->role); ?></p>
                        <?php if($m->bio): ?><p class="small text-secondary mb-0"><?php echo e($m->bio); ?></p><?php endif; ?>
                        <?php if($m->linkedin): ?>
                            <a href="<?php echo e($m->linkedin); ?>" target="_blank" class="small fw-semibold text-secondary d-inline-flex align-items-center gap-1 mt-3">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.cta-band', [
    'title1' => 'WANT TO BUILD WITH',
    'title2' => 'THIS TEAM?',
    'subtitle' => "We're always interested in ambitious projects — and ambitious people. Reach out and let's talk.",
    'buttonText' => 'Start a Conversation',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/team.blade.php ENDPATH**/ ?>