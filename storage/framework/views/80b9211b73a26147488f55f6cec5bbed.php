<?php $__env->startSection('content'); ?>
<?php ($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d)); ?>

<?php echo $__env->make('partials.breadcrumbs', ['crumbs' => [['label' => 'Team']], 'dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php echo $__env->make('partials.dark-hero', [
    'badge' => $S('team.hero.badge', 'The People Behind The Platforms'),
    'title1' => $S('team.hero.title1', 'Meet the'),
    'title2' => $S('team.hero.title2', 'team'),
    'tagline' => $S('team.hero.tagline', 'A compact senior team of engineers, designers, and cloud specialists — every project led directly by the people who build it.'),
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Leadership &amp; Engineering</p>
        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card-soft hoverable p-4 text-center">
                        <?php if($m->photo_url): ?>
                            <img src="<?php echo e($m->photo_url); ?>" alt="<?php echo e($m->name); ?>, <?php echo e($m->role); ?> at Vectarlabs" class="rounded-2" style="width: 200px; height: 200px; object-fit: cover;" loading="lazy" decoding="async" width="200" height="200">
                        <?php else: ?>
                            <span class="avatar-initials <?php echo e($i % 2 ? 'alt' : ''); ?>" style="width: 200px; height: 200px; font-size: 3.4rem;"><?php echo e($m->initials()); ?></span>
                        <?php endif; ?>
                        <h5 class="font-display fw-bold text-navy mt-3 mb-0"><?php echo e($m->name); ?></h5>
                        <p class="text-brand fw-bold text-uppercase mb-2" style="font-size: .72rem; letter-spacing: .12em;"><?php echo e($m->role); ?></p>
                        <?php if($m->bio): ?><p class="small text-secondary mb-0"><?php echo e(Str::limit($m->bio, 140)); ?></p><?php endif; ?>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <?php if($m->email): ?><a href="mailto:<?php echo e($m->email); ?>" class="text-secondary"><i class="bi bi-envelope"></i></a><?php endif; ?>
                            <?php if($m->linkedin): ?><a href="<?php echo e($m->linkedin); ?>" target="_blank" class="text-secondary"><i class="bi bi-linkedin"></i></a><?php endif; ?>
                            <?php if($m->twitter): ?><a href="<?php echo e($m->twitter); ?>" target="_blank" class="text-secondary"><i class="bi bi-twitter-x"></i></a><?php endif; ?>
                            <?php if($m->github): ?><a href="<?php echo e($m->github); ?>" target="_blank" class="text-secondary"><i class="bi bi-github"></i></a><?php endif; ?>
                        </div>
                        <a href="<?php echo e(route('team.show', $m->slug)); ?>" class="small fw-bold text-brand text-decoration-none d-inline-block mt-3">View full profile <i class="bi bi-arrow-right"></i></a>
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