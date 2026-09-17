<?php $__env->startSection('content'); ?>
<?php ($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d)); ?>


<section class="hero-slider">
    <div class="container">
        <div class="mx-auto" style="max-width: 52rem;">
            <span class="hero-badge"><?php echo e($S('home.hero.eyebrow', 'Software · Cloud · Design')); ?></span>
            <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(2rem, 5.5vw, 3.6rem);">
                <?php echo e($S('home.hero.title1', 'Building High-Impact')); ?><br>
                <?php echo e($S('home.hero.title2', 'Digital Infrastructure for')); ?> <span class="text-brand"><?php echo e($S('home.hero.title3', 'Growing Enterprises')); ?></span>
            </h1>
            <p class="font-serif-body mx-auto mt-4" style="max-width: 38rem; color: rgba(255,255,255,.65);"><?php echo e($S('home.hero.subtitle')); ?></p>
            <a href="<?php echo e(route('contact')); ?>" class="btn-brand mt-4"><?php echo e($S('home.hero.button', 'Book Consultation')); ?> <i class="bi bi-arrow-right"></i></a>
            <div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
                <span class="hero-chip">Custom Web Platforms</span>
                <span class="hero-chip">Cloud Infrastructure</span>
                <span class="hero-chip">Mobile Applications</span>
            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">What we do</p>
        <div class="row align-items-end g-4 mt-1">
            <div class="col-md-7">
                <h2 class="display-hero text-navy" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem);"><?php echo e($S('home.services.title')); ?></h2>
            </div>
            <div class="col-md-5 text-md-end">
                <p class="font-serif-body text-secondary mb-0">We partner with ambitious institutions to design, build, and maintain the digital systems their missions depend on.</p>
            </div>
        </div>
        <div class="row g-4 mt-2">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <a href="<?php echo e(route('services.show', $s->slug)); ?>" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="font-display fw-bold text-navy text-capitalize"><?php echo e(strtolower($s->title_line1.' '.$s->title_line2)); ?></h5>
                                <i class="bi bi-arrow-up-right text-brand"></i>
                            </div>
                            <p class="small text-secondary mt-2 mb-0"><?php echo e($s->summary); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4">
                <a href="<?php echo e(route('services')); ?>" class="text-decoration-none">
                    <div class="card-soft hoverable p-4 d-flex align-items-center justify-content-center text-center" style="border-style: dashed; background: #fff8f2;">
                        <span class="font-display fw-bold text-brand">Explore all services <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker centered">Industries</p>
        <h2 class="display-hero text-navy text-center mx-auto mt-3" style="max-width: 42rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem);"><?php echo e($S('home.sectors.title')); ?></h2>
        <div class="row g-4 mt-3">
            <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-lg-3">
                    <a href="<?php echo e(route('industries.show', $ind->slug)); ?>" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <span class="icon-chip mb-3"><i class="bi <?php echo e($ind->iconClass()); ?>"></i></span>
                            <h6 class="font-display fw-bold text-navy"><?php echo e($ind->name); ?></h6>
                            <p class="small text-secondary mb-0"><?php echo e($ind->summary); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <p class="text-center mt-4"><a href="<?php echo e(route('industries')); ?>" class="fw-bold text-brand text-decoration-none">Explore all industries <i class="bi bi-arrow-right"></i></a></p>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Trusted by technology &amp; operational leaders</p>
        <div class="row align-items-center g-5 mt-1">
            <div class="col-lg-6">
                <i class="bi bi-quote fs-1 text-brand"></i>
                <blockquote class="font-serif-body text-navy" style="font-size: 1.35rem; line-height: 1.6;">
                    “<?php echo e($S('home.testimonial.quote')); ?>”
                </blockquote>
                <p class="font-display fw-bold text-navy mt-4 mb-0"><?php echo e($S('home.testimonial.author')); ?></p>
                <p class="small text-secondary"><?php echo e($S('home.testimonial.role')); ?></p>
            </div>
            <div class="col-lg-6"><div class="abstract-panel panel-b" style="height: 18rem;"></div></div>
        </div>
        <div class="card-soft row g-4 text-center px-4 py-5 mt-5 mx-0">
            <?php $__currentLoopData = [1, 2, 3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4">
                    <div class="stat-value"><?php echo e($S("home.stats.$i.value")); ?></div>
                    <div class="stat-label"><?php echo e($S("home.stats.$i.label")); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker"><?php echo e($S('home.approach.title', 'Our approach')); ?></p>
        <div class="row g-5 mt-1">
            <div class="col-lg-6"><div class="abstract-panel panel-a" style="height: 20rem;"></div></div>
            <div class="col-lg-6">
                <ol class="list-unstyled d-grid gap-4">
                    <?php $__currentLoopData = [
                        ['Operational Audit & Discovery', 'Assess existing workflows, identify structural risks, and map clear digitization goals.'],
                        ['Custom Architecture & Integration', 'Design bespoke systems and integrations — including M-Pesa APIs and cloud infrastructure — built for your context.'],
                        ['User Training & Onboarding', 'Conduct hands-on workshops and provide clear documentation for smooth adoption.'],
                        ['Deployment & Managed Support', 'Go live with cloud hosting, automated backups, and guaranteed high uptime.'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => [$step, $body]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="d-flex gap-3">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle border border-warning font-display fw-bold text-brand flex-shrink-0" style="width: 2.2rem; height: 2.2rem;"><?php echo e($i + 1); ?></span>
                            <div>
                                <h6 class="font-display fw-bold text-navy mb-1"><?php echo e($step); ?></h6>
                                <p class="small text-secondary mb-0"><?php echo e($body); ?></p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <a href="<?php echo e(route('contact')); ?>" class="btn-dark-pill mt-4 ms-5">Start your project</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/home.blade.php ENDPATH**/ ?>