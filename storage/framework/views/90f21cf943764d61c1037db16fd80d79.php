<?php ($footServices = \App\Models\Service::published()->get()); ?>
<?php ($Sf = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d)); ?>
<footer class="footer-dark pt-5">
    <div class="container" style="max-width: 72rem;">
        <div class="row g-5 pb-5">
            <div class="col-md-4">
                <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center gap-2 text-decoration-none">
                    <?php echo $__env->make('partials.logo', ['height' => 34], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <span class="font-display fw-bold text-white">Vectarlabs</span>
                </a>
                <p class="mt-3 font-serif-body" style="max-width: 20rem;">
                    <?php echo e($Sf('footer.description', 'Engineering scalable web platforms, bespoke management systems, and cloud architectures for educational institutions and growing enterprises.')); ?>

                </p>
            </div>
            <div class="col-6 col-md-2">
                <h6 class="font-display text-white">Company</h6>
                <ul class="list-unstyled small d-grid gap-2 mt-3">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(route('team')); ?>">Team</a></li>
                    <li><a href="<?php echo e(route('insights')); ?>">Insights</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2">
                <h6 class="font-display text-white">Explore</h6>
                <ul class="list-unstyled small d-grid gap-2 mt-3">
                    <li><a href="<?php echo e(route('industries')); ?>">Industries</a></li>
                    <li><a href="<?php echo e(route('works')); ?>">Our Work</a></li>
                    <li><a href="<?php echo e(route('products')); ?>">Products</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-4">
                <h6 class="font-display text-white">Services</h6>
                <ul class="list-unstyled small d-grid gap-2 mt-3">
                    <?php $__currentLoopData = $footServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('services.show', $s->slug)); ?>"><?php echo e($s->title_line1); ?> <?php echo e($s->title_line2); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 py-4 border-top border-secondary small">
            <span><?php echo $Sf('footer.copyright', '© 2026 Vectarlabs. All rights reserved. Built for school systems &amp; software innovation.'); ?></span>
            <span class="d-flex gap-3">
                <?php if($Sf('seo.social.twitter')): ?><a href="<?php echo e($Sf('seo.social.twitter')); ?>" target="_blank" rel="noopener" aria-label="Twitter / X"><i class="bi bi-twitter-x"></i></a><?php endif; ?>
                <?php if($Sf('seo.social.linkedin')): ?><a href="<?php echo e($Sf('seo.social.linkedin')); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a><?php endif; ?>
                <?php if($Sf('seo.social.github')): ?><a href="<?php echo e($Sf('seo.social.github')); ?>" target="_blank" rel="noopener" aria-label="GitHub"><i class="bi bi-github"></i></a><?php endif; ?>
            </span>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/footer.blade.php ENDPATH**/ ?>