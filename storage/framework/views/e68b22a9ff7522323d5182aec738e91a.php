<?php $__env->startSection('title', $post->title . ' — Vectarlabs Insights'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.breadcrumbs', ['crumbs' => [['label' => 'Insights', 'url' => route('insights')], ['label' => \Illuminate\Support\Str::limit($post->title, 40)]], 'dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="hero-dark" style="padding-bottom: 4rem;">
    <div class="container" style="max-width: 48rem;">
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
            <span class="hero-badge"><?php echo e($post->tag); ?></span>
            <span class="small text-white-50"><?php echo e($post->created_at->format('d F Y')); ?></span>
        </div>
        <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(1.8rem, 4.5vw, 3rem);"><?php echo e($post->title); ?></h1>
        <p class="mx-auto mt-4 text-white-50 font-serif-body" style="max-width: 40rem;"><?php echo e($post->excerpt); ?></p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 44rem;">
        <?php ($paragraphs = array_values(array_filter(array_map('trim', preg_split('/\n+/', (string) ($post->body ?: $post->excerpt)))))); ?>
        <?php $__currentLoopData = $paragraphs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $para): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="font-serif-body text-secondary" style="font-size: 1.08rem; line-height: 1.85;"><?php echo e($para); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($morePosts->count()): ?>
            <p class="section-marker mt-5 pt-4">Keep reading</p>
            <div class="row g-4 mt-2">
                <?php $__currentLoopData = $morePosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <a href="<?php echo e(route('insights.show', $p->id)); ?>" class="text-decoration-none">
                            <div class="card-soft hoverable p-4">
                                <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;"><?php echo e($p->tag); ?></span>
                                <h6 class="font-display fw-bold text-navy mt-2 mb-0"><?php echo e($p->title); ?></h6>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'seoTitle' => $post->title . ' — Vectarlabs Insights',
    'seoDescription' => $post->excerpt,
    'seoType' => 'article',
    'seoJsonLd' => [[
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $post->title,
        'description' => $post->excerpt,
        'datePublished' => $post->created_at->toAtomString(),
        'dateModified' => $post->updated_at->toAtomString(),
        'author' => ['@type' => 'Organization', 'name' => \App\Models\Setting::get('seo.site_name', 'Vectarlabs')],
        'mainEntityOfPage' => route('insights.show', $post->id),
    ]],
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/insights/show.blade.php ENDPATH**/ ?>