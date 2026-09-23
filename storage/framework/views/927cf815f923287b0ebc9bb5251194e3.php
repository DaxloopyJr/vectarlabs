<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Vectarlabs — Software · Cloud · Design'); ?></title>

    
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"></noscript>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <?php echo $__env->make('partials.seo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>
    <div class="page-loader" id="pageLoader" aria-hidden="true">
        <span class="loader-mark">V</span>
        <div class="loader-track"></div>
    </div>

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script>
        window.addEventListener('load', function () {
            setTimeout(function () { document.getElementById('pageLoader').classList.add('done'); }, 350);
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    
    <?php ($ga4 = \App\Models\Setting::get('seo.ga4_id')); ?>
    <?php if($ga4): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($ga4); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo e($ga4); ?>');
        </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/layouts/app.blade.php ENDPATH**/ ?>