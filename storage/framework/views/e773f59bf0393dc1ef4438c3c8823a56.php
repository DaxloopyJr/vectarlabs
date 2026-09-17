<?php $__env->startSection('title', 'Insights — Vectarlabs'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.dark-hero', [
    'badge' => 'Insights',
    'title1' => 'Thinking',
    'title2' => 'that ships.',
    'tagline' => 'Field notes on engineering, security, design, and digital transformation — written by the team that builds the systems.',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">All articles</p>
        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <a href="<?php echo e(route('insights.show', $post->id)); ?>" class="text-decoration-none">
                        <article class="card-soft hoverable overflow-hidden">
                            <div class="abstract-panel panel-<?php echo e(substr($post->cover_style, -1)); ?>" style="height: 11rem; border-radius: 0;"></div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="tag-chip"><?php echo e($post->tag); ?></span>
                                    <span class="small text-secondary"><?php echo e($post->created_at->format('d M Y')); ?></span>
                                </div>
                                <h6 class="font-display fw-bold text-navy mt-3"><?php echo e($post->title); ?></h6>
                                <p class="small text-secondary mb-0"><?php echo e($post->excerpt); ?></p>
                            </div>
                        </article>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php echo $__env->make('partials.cta-band', [
    'title1' => 'PREFER TO TALK',
    'title2' => 'INSTEAD?',
    'subtitle' => 'Reading is good. A working session with our engineers is better — bring your hardest problem.',
    'buttonText' => 'Book a Session',
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/insights/index.blade.php ENDPATH**/ ?>