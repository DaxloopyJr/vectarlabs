<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin — Vectarlabs CMS'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body style="background: #f2efe8;">
<div class="d-flex">
    <aside class="admin-sidebar d-none d-md-flex flex-column flex-shrink-0 p-3" style="width: 240px;">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-2 text-decoration-none px-2 py-2">
            <span class="logo-mark">V</span>
            <span>
                <span class="d-block font-display fw-bold text-white" style="line-height: 1;">Vectarlabs</span>
                <span class="d-block text-white-50" style="font-size: .62rem; letter-spacing: .2em; text-transform: uppercase;">Admin Panel</span>
            </span>
        </a>
        <ul class="nav flex-column gap-1 mt-4">
            <?php $__currentLoopData = [
                ['admin.dashboard', 'grid-1x2-fill', 'Dashboard'],
                ['admin.services.index', 'tools', 'Services'],
                ['admin.industries.index', 'building', 'Industries'],
                ['admin.products.index', 'box-seam', 'Products'],
                ['admin.works.index', 'kanban', 'Our Work'],
                ['admin.team.index', 'people', 'Team'],
                ['admin.posts.index', 'file-text', 'Insights'],
                ['admin.slides.index', 'images', 'Hero Slides'],
                ['admin.testimonials.index', 'chat-quote', 'Testimonials'],
                ['admin.messages.index', 'inbox', 'Messages'],
                ['admin.content.index', 'sliders', 'Site Content'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$route, $icon, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a class="nav-link <?php echo e(request()->routeIs(str_replace('.index', '.*', $route)) || request()->routeIs($route) ? 'active' : ''); ?>" href="<?php echo e(route($route)); ?>"><i class="bi bi-<?php echo e($icon); ?> me-2"></i><?php echo e($label); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mt-auto border-top border-secondary pt-3">
            <a class="nav-link text-white-50" href="<?php echo e(route('home')); ?>"><i class="bi bi-box-arrow-up-right me-2"></i>View website</a>
            <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="nav-link text-white-50 bg-transparent border-0 w-100 text-start"><i class="bi bi-box-arrow-right me-2"></i>Sign out</button>
            </form>
        </div>
    </aside>

    <main class="flex-grow-1 min-vh-100" style="min-width: 0;">
        <nav class="d-md-none navbar navbar-dark bg-navy-deep px-3">
            <a class="navbar-brand font-display fw-bold" href="<?php echo e(route('admin.dashboard')); ?>">Vectarlabs Admin</a>
            <div class="d-flex gap-2 overflow-auto">
                <?php $__currentLoopData = [
                    ['admin.dashboard', 'Dashboard'], ['admin.services.index', 'Services'], ['admin.industries.index', 'Industries'],
                    ['admin.products.index', 'Products'], ['admin.works.index', 'Work'], ['admin.team.index', 'Team'],
                    ['admin.posts.index', 'Insights'], ['admin.slides.index', 'Slides'], ['admin.testimonials.index', 'Testimonials'],
                    ['admin.messages.index', 'Messages'], ['admin.content.index', 'Content'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$route, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="btn btn-sm <?php echo e(request()->routeIs(str_replace('.index', '.*', $route)) ? 'btn-brand border-0' : 'btn-outline-light'); ?> rounded-pill text-nowrap" href="<?php echo e(route($route)); ?>"><?php echo e($label); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </nav>

        <div class="p-4 p-lg-5">
            <?php if(session('success')): ?>
                <div class="alert alert-success border-0 small"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/layouts/admin.blade.php ENDPATH**/ ?>