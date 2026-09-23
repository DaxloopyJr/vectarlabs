
<?php
    $S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d);
    $seoSiteName    = $S('seo.site_name', 'Vectarlabs');
    $seoTitle       = trim($__env->yieldContent('title')) ?: ($seoTitle ?? $S('seo.default_title', 'Vectarlabs — Software · Cloud · Design'));
    $seoDescription = $seoDescription ?? $S('seo.default_description', 'Vectarlabs designs, builds, and maintains web platforms, management systems, mobile applications, and cloud infrastructure for institutions and enterprises across Africa and beyond.');
    $seoKeywords    = $seoKeywords ?? $S('seo.default_keywords', 'software development, web platforms, cloud infrastructure, mobile apps, school management systems, Kenya, East Africa');
    $seoImage       = $seoImage ?? ($S('seo.default_image') ? url($S('seo.default_image')) : url('css/../favicon.ico'));
    $seoType        = $seoType ?? 'website';
    $seoCanonical   = $seoCanonical ?? url()->current();
    $seoRobots      = $seoRobots ?? 'index, follow';
?>
<meta name="description" content="<?php echo e($seoDescription); ?>">
<meta name="keywords" content="<?php echo e($seoKeywords); ?>">
<meta name="robots" content="<?php echo e($seoRobots); ?>">
<meta name="author" content="<?php echo e($seoSiteName); ?>">
<link rel="canonical" href="<?php echo e($seoCanonical); ?>">


<meta property="og:site_name" content="<?php echo e($seoSiteName); ?>">
<meta property="og:type" content="<?php echo e($seoType); ?>">
<meta property="og:title" content="<?php echo e($seoTitle); ?>">
<meta property="og:description" content="<?php echo e($seoDescription); ?>">
<meta property="og:url" content="<?php echo e($seoCanonical); ?>">
<meta property="og:image" content="<?php echo e($seoImage); ?>">
<meta property="og:locale" content="en_US">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($seoTitle); ?>">
<meta name="twitter:description" content="<?php echo e($seoDescription); ?>">
<meta name="twitter:image" content="<?php echo e($seoImage); ?>">
<?php if($S('seo.twitter_handle')): ?><meta name="twitter:site" content="<?php echo e($S('seo.twitter_handle')); ?>"><?php endif; ?>


<script type="application/ld+json">
<?php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $seoSiteName,
    'url' => url('/'),
    'logo' => $S('site.logo') ? url($S('site.logo')) : null,
    'email' => $S('contact.email'),
    'telephone' => $S('contact.phone'),
    'address' => ['@type' => 'PostalAddress', 'addressLocality' => $S('contact.location')],
    'sameAs' => array_values(array_filter([
        $S('seo.social.twitter'), $S('seo.social.linkedin'), $S('seo.social.github'),
    ])),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>

</script>
<?php if(request()->routeIs('home')): ?>
<script type="application/ld+json">
<?php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $seoSiteName,
    'url' => url('/'),
], JSON_UNESCAPED_SLASHES); ?>

</script>
<?php endif; ?>
<?php $__currentLoopData = $seoJsonLd ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<script type="application/ld+json"><?php echo json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if($S('seo.gsc_verification')): ?>
<meta name="google-site-verification" content="<?php echo e($S('seo.gsc_verification')); ?>">
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/partials/seo.blade.php ENDPATH**/ ?>