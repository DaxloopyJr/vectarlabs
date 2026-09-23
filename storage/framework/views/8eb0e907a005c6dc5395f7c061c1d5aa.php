<nav class="position-fixed top-0 start-0 end-0 mt-3 px-3" style="z-index: 1050;">
    <div class="container" style="max-width: 72rem;">
        <div class="navbar-pill d-flex align-items-center justify-content-between py-2 ps-4 pe-2">
            <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center gap-2 text-decoration-none">
                <?php echo $__env->make('partials.logo', ['height' => 34], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <span class="font-display fw-bold text-navy fs-4">Vectarlabs</span>
            </a>

            <ul class="nav d-none d-lg-flex align-items-center gap-1">
                <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('services*') ? 'active' : ''); ?>" href="<?php echo e(route('services')); ?>">Services</a></li>
                <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('industries*') ? 'active' : ''); ?>" href="<?php echo e(route('industries')); ?>">Industries</a></li>
                <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('works*') ? 'active' : ''); ?>" href="<?php echo e(route('works')); ?>">Work</a></li>
                <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('products') ? 'active' : ''); ?>" href="<?php echo e(route('products')); ?>">Products</a></li>
                <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('insights*') ? 'active' : ''); ?>" href="<?php echo e(route('insights')); ?>">Insights</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs(['about', 'team*', 'contact*']) ? 'active' : ''); ?>" href="#" id="companyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Company</a>
                    <ul class="dropdown-menu border-0 shadow" aria-labelledby="companyDropdown">
                        <li><a class="dropdown-item <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">About Us</a></li>
                        <li><a class="dropdown-item <?php echo e(request()->routeIs('team*') ? 'active' : ''); ?>" href="<?php echo e(route('team')); ?>">Team</a></li>
                        <li><a class="dropdown-item <?php echo e(request()->routeIs('contact*') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">Contact</a></li>
                    </ul>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <a href="<?php echo e(route('contact')); ?>" class="btn-brand d-none d-sm-inline-flex" style="padding: .55rem 1.3rem; font-size: .78rem;">Book Consultation</a>
                <button class="btn d-lg-none" data-bs-toggle="collapse" data-bs-target="#mobileNav"><i class="bi bi-list fs-4"></i></button>
            </div>
        </div>

        <div class="collapse d-lg-none mt-2" id="mobileNav">
            <div class="card border-0 shadow">
                <div class="list-group list-group-flush rounded">
                    <a class="list-group-item list-group-item-action <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                    <a class="list-group-item list-group-item-action <?php echo e(request()->routeIs('services*') ? 'active' : ''); ?>" href="<?php echo e(route('services')); ?>">Services</a>
                    <a class="list-group-item list-group-item-action <?php echo e(request()->routeIs('industries*') ? 'active' : ''); ?>" href="<?php echo e(route('industries')); ?>">Industries</a>
                    <a class="list-group-item list-group-item-action <?php echo e(request()->routeIs('works*') ? 'active' : ''); ?>" href="<?php echo e(route('works')); ?>">Work</a>
                    <a class="list-group-item list-group-item-action <?php echo e(request()->routeIs('products') ? 'active' : ''); ?>" href="<?php echo e(route('products')); ?>">Products</a>
                    <a class="list-group-item list-group-item-action <?php echo e(request()->routeIs('insights*') ? 'active' : ''); ?>" href="<?php echo e(route('insights')); ?>">Insights</a>
                    <span class="list-group-item text-secondary small fw-bold text-uppercase" style="letter-spacing: .15em;">Company</span>
                    <a class="list-group-item list-group-item-action ps-4 <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">About Us</a>
                    <a class="list-group-item list-group-item-action ps-4 <?php echo e(request()->routeIs('team*') ? 'active' : ''); ?>" href="<?php echo e(route('team')); ?>">Team</a>
                    <a class="list-group-item list-group-item-action ps-4 <?php echo e(request()->routeIs('contact*') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">Contact</a>
                    <a class="list-group-item list-group-item-action" href="<?php echo e(route('contact')); ?>">Book Consultation</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/navbar.blade.php ENDPATH**/ ?>