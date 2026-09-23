<?php $__env->startSection('content'); ?>
<?php ($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d)); ?>


<section class="hero-slider">
    <div class="container">
        <div class="hero-slides-wrap d-flex align-items-center justify-content-center">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="hero-slide mx-auto <?php echo e($i ? 'hidden-slide' : ''); ?>" style="max-width: 52rem;" data-slide>
                    <span class="hero-badge"><?php echo e($slide->eyebrow); ?></span>
                    <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(2rem, 5.5vw, 3.6rem); text-transform: none;">
                        <?php echo e($slide->title1); ?><br>
                        <?php echo e($slide->title2); ?> <?php if($slide->title3): ?><span class="text-brand"><?php echo e($slide->title3); ?></span><?php endif; ?>
                    </h1>
                    <?php if($slide->subtitle): ?>
                        <p class="font-serif-body mx-auto mt-4" style="max-width: 38rem; color: rgba(255,255,255,.65);"><?php echo e($slide->subtitle); ?></p>
                    <?php endif; ?>
                    <?php if($slide->button_text): ?>
                        <a href="<?php echo e($slide->button_url ?: route('contact')); ?>" class="btn-brand mt-4"><?php echo e($slide->button_text); ?> <i class="bi bi-arrow-right"></i></a>
                    <?php endif; ?>
                    <?php if($slide->chipList()): ?>
                        <div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
                            <?php $__currentLoopData = $slide->chipList(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="hero-chip"><?php echo e($chip); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($slides->count() > 1): ?>
            <div class="d-flex align-items-center justify-content-center gap-3 mt-5">
                <button class="slider-arrow" id="heroPrev" aria-label="Previous slide"><i class="bi bi-arrow-left"></i></button>
                <div class="d-flex gap-2">
                    <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="slider-dot <?php echo e($i ? '' : 'active'); ?>" data-dot="<?php echo e($i); ?>" aria-label="Go to slide <?php echo e($i + 1); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="slider-arrow" id="heroNext" aria-label="Next slide"><i class="bi bi-arrow-right"></i></button>
            </div>
        <?php endif; ?>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker"><?php echo e($S('home.services.marker', 'What we do')); ?></p>
        <div class="row align-items-end g-4 mt-1">
            <div class="col-md-7">
                <h2 class="display-hero text-navy" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); text-transform: none;"><?php echo e($S('home.services.title')); ?></h2>
            </div>
            <div class="col-md-5 text-md-end">
                <p class="font-serif-body text-secondary mb-0"><?php echo e($S('home.services.subtitle', 'We partner with ambitious institutions to design, build, and maintain the digital systems their missions depend on.')); ?></p>
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
                        <span class="font-display fw-bold text-brand"><?php echo e($S('home.services.more', 'Explore all services')); ?> <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker centered"><?php echo e($S('home.sectors.marker', 'Industries')); ?></p>
        <h2 class="display-hero text-navy text-center mx-auto mt-3" style="max-width: 42rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem); text-transform: none;"><?php echo e($S('home.sectors.title')); ?></h2>
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
        <p class="text-center mt-4"><a href="<?php echo e(route('industries')); ?>" class="fw-bold text-brand text-decoration-none"><?php echo e($S('home.sectors.more', 'Explore all industries')); ?> <i class="bi bi-arrow-right"></i></a></p>
    </div>
</section>


<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker"><?php echo e($S('home.testimonials.marker', 'Trusted by technology & operational leaders')); ?></p>

        <?php if($testimonials->count()): ?>
            <div class="position-relative mt-3">
                <div class="t-viewport overflow-hidden">
                    <div class="t-track d-flex" id="testimonialTrack">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ti => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="t-slide flex-shrink-0 px-2">
                                <div class="card-soft p-4 h-100">
                                    <i class="bi bi-quote fs-2 text-brand"></i>
                                    <blockquote class="font-serif-body text-navy mt-2 mb-0" style="font-size: 1.05rem; line-height: 1.65;">
                                        “<?php echo e($t->quote); ?>”
                                    </blockquote>
                                    <div class="d-flex align-items-center gap-3 mt-4">
                                        <?php if($t->photo_url): ?>
                                            <img src="<?php echo e($t->photo_url); ?>" alt="<?php echo e($t->author); ?>, <?php echo e($t->role); ?>" class="rounded-2" style="width: 52px; height: 52px; object-fit: cover;" loading="lazy" decoding="async" width="52" height="52">
                                        <?php else: ?>
                                            <span class="avatar-initials <?php echo e($ti % 2 ? 'alt' : ''); ?>" style="width: 52px; height: 52px; font-size: 1rem; border-radius: .5rem;"><?php echo e($t->initials()); ?></span>
                                        <?php endif; ?>
                                        <div>
                                            <p class="font-display fw-bold text-navy mb-0"><?php echo e($t->author); ?></p>
                                            <p class="small text-secondary mb-0"><?php echo e($t->role); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <button class="slider-arrow slider-arrow-light" id="tPrev" aria-label="Previous testimonials"><i class="bi bi-arrow-left"></i></button>
                    <div class="d-flex gap-2" id="tDots"></div>
                    <button class="slider-arrow slider-arrow-light" id="tNext" aria-label="Next testimonials"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        <?php endif; ?>

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
        <p class="section-marker"><?php echo e($S('home.approach.marker', 'Our approach')); ?></p>
        <div class="row g-5 mt-1">
            <div class="col-lg-6"><div class="abstract-panel panel-a" style="height: 20rem;"></div></div>
            <div class="col-lg-6">
                <ol class="list-unstyled d-grid gap-4">
                    <?php $__currentLoopData = [1, 2, 3, 4]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="d-flex gap-3">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle border border-warning font-display fw-bold text-brand flex-shrink-0" style="width: 2.2rem; height: 2.2rem;"><?php echo e($i); ?></span>
                            <div>
                                <h6 class="font-display fw-bold text-navy mb-1"><?php echo e($S("home.approach.step$i.title")); ?></h6>
                                <p class="small text-secondary mb-0"><?php echo e($S("home.approach.step$i.body")); ?></p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <a href="<?php echo e(route('contact')); ?>" class="btn-dark-pill mt-4 ms-5"><?php echo e($S('home.approach.button', 'Start your project')); ?></a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
    // ---------- Hero slider ----------
    const slides = document.querySelectorAll('[data-slide]');
    if (slides.length > 1) {
        const dots = document.querySelectorAll('[data-dot]');
        let current = 0, timer = null;

        function go(n) {
            current = (n + slides.length) % slides.length;
            slides.forEach((s, i) => s.classList.toggle('hidden-slide', i !== current));
            dots.forEach((d, i) => d.classList.toggle('active', i === current));
        }
        function restart() { clearInterval(timer); timer = setInterval(() => go(current + 1), 6000); }

        document.getElementById('heroPrev').addEventListener('click', () => { go(current - 1); restart(); });
        document.getElementById('heroNext').addEventListener('click', () => { go(current + 1); restart(); });
        dots.forEach(d => d.addEventListener('click', () => { go(parseInt(d.dataset.dot, 10)); restart(); }));
        restart();
    }

    // ---------- Testimonials slider (multi-card) ----------
    const track = document.getElementById('testimonialTrack');
    if (track) {
        const items = track.children.length;
        const dotsWrap = document.getElementById('tDots');
        let pos = 0;

        const perView = () => window.innerWidth >= 992 ? 2 : 1;
        const maxPos  = () => Math.max(0, items - perView());

        function render() {
            pos = Math.min(pos, maxPos());
            const w = track.children[0].getBoundingClientRect().width;
            track.style.transform = 'translateX(' + (-pos * w) + 'px)';
            dotsWrap.innerHTML = '';
            for (let i = 0; i <= maxPos(); i++) {
                const b = document.createElement('button');
                b.className = 'slider-dot slider-dot-light' + (i === pos ? ' active' : '');
                b.setAttribute('aria-label', 'Go to testimonials page ' + (i + 1));
                b.addEventListener('click', () => { pos = i; render(); });
                dotsWrap.appendChild(b);
            }
        }
        document.getElementById('tPrev').addEventListener('click', () => { pos = pos > 0 ? pos - 1 : maxPos(); render(); });
        document.getElementById('tNext').addEventListener('click', () => { pos = pos < maxPos() ? pos + 1 : 0; render(); });
        window.addEventListener('resize', render);
        render();
        setInterval(() => { pos = pos < maxPos() ? pos + 1 : 0; render(); }, 7000);
    }
})();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/home.blade.php ENDPATH**/ ?>