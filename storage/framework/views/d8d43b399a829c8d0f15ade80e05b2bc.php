<?php $__env->startSection('title', $member->name . ' — Vectarlabs Team'); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-dark" style="padding-bottom: 4rem;">
    <div class="container">
        <span class="hero-badge">Team Member</span>
        <div class="mt-4">
            <?php if($member->photo_url): ?>
                <img src="<?php echo e($member->photo_url); ?>" alt="<?php echo e($member->name); ?>" class="rounded-4 border border-2 border-light" style="width: 120px; height: 120px; object-fit: cover;">
            <?php else: ?>
                <span class="avatar-initials" style="width: 120px; height: 120px; font-size: 2.4rem;"><?php echo e($member->initials()); ?></span>
            <?php endif; ?>
        </div>
        <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(2rem, 5vw, 3.4rem);"><?php echo e($member->name); ?></h1>
        <p class="text-brand fw-bold text-uppercase mt-2" style="font-size: .8rem; letter-spacing: .18em;"><?php echo e($member->role); ?></p>
        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
            <?php if($member->email): ?><a href="mailto:<?php echo e($member->email); ?>" class="hero-chip text-decoration-none"><i class="bi bi-envelope me-1"></i><?php echo e($member->email); ?></a><?php endif; ?>
            <?php if($member->phone): ?><a href="tel:<?php echo e($member->phone); ?>" class="hero-chip text-decoration-none"><i class="bi bi-telephone me-1"></i><?php echo e($member->phone); ?></a><?php endif; ?>
            <?php if($member->website): ?><a href="<?php echo e($member->website); ?>" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-globe me-1"></i>Website</a><?php endif; ?>
            <?php if($member->linkedin): ?><a href="<?php echo e($member->linkedin); ?>" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-linkedin me-1"></i>LinkedIn</a><?php endif; ?>
            <?php if($member->twitter): ?><a href="<?php echo e($member->twitter); ?>" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-twitter-x me-1"></i>X / Twitter</a><?php endif; ?>
            <?php if($member->github): ?><a href="<?php echo e($member->github); ?>" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-github me-1"></i>GitHub</a><?php endif; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 44rem;">
        <p class="section-marker">Biography</p>
        <?php ($paragraphs = array_values(array_filter(array_map('trim', preg_split('/\n+/', (string) $member->bio))))); ?>
        <?php $__currentLoopData = $paragraphs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $para): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="font-serif-body text-secondary mt-3" style="font-size: 1.08rem; line-height: 1.85;"><?php echo e($para); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('team')); ?>" class="fw-bold text-brand text-decoration-none d-inline-block mt-4"><i class="bi bi-arrow-left"></i> Back to the team</a>
    </div>
</section>

<?php echo $__env->make('partials.cta-band', [
    'title1' => 'WANT TO WORK WITH',
    'title2' => strtoupper(explode(' ', $member->name)[0]) . '\'S TEAM?',
    'subtitle' => 'Every project is led directly by the people who build it. Tell us what you are planning.',
    'buttonText' => 'Start a Conversation',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/team/show.blade.php ENDPATH**/ ?>