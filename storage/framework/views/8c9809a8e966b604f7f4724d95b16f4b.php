<?php $__env->startSection('content'); ?>
<?php
    $humanize = function (string $key): string {
        $words = str_replace(['.', '_', '-'], ' ', $key);
        $words = preg_replace('/([a-z])(\d)/', '$1 $2', $words);
        $acronyms = ['seo' => 'SEO', 'gsc' => 'GSC', 'ga4' => 'GA4', 'cta' => 'CTA', 'url' => 'URL', 'id' => 'ID'];
        return implode(' ', array_map(fn ($w) => $acronyms[strtolower($w)] ?? ucfirst($w), explode(' ', $words)));
    };

    $tabs = [
        'home'       => ['icon' => 'house',          'label' => 'Home Page'],
        'about'      => ['icon' => 'info-circle',    'label' => 'About Page'],
        'services'   => ['icon' => 'tools',          'label' => 'Services Page'],
        'industries' => ['icon' => 'building',       'label' => 'Industries Page'],
        'works'      => ['icon' => 'kanban',         'label' => 'Work Page'],
        'products'   => ['icon' => 'box-seam',       'label' => 'Products Page'],
        'insights'   => ['icon' => 'file-text',      'label' => 'Insights Page'],
        'team'       => ['icon' => 'people',         'label' => 'Team Page'],
        'contact'    => ['icon' => 'envelope',       'label' => 'Contact Page'],
        'footer'     => ['icon' => 'layout-text-sidebar-reverse', 'label' => 'Footer'],
        'seo'        => ['icon' => 'search',         'label' => 'SEO & Analytics'],
    ];

    $seoLabels = [
        'site_name'         => 'Site name',
        'default_title'     => 'Default page title',
        'default_description' => 'Default meta description',
        'default_keywords'  => 'Default meta keywords',
        'default_image'     => 'Default social share image URL',
        'twitter_handle'    => 'Twitter/X handle (e.g. @vectarlabs)',
        'social_twitter'    => 'Twitter/X profile URL',
        'social_linkedin'   => 'LinkedIn page URL',
        'social_github'     => 'GitHub organisation URL',
        'gsc_verification'  => 'Google Search Console verification token',
        'ga4_id'            => 'Google Analytics 4 measurement ID (e.g. G-XXXXXXX)',
    ];

    $byPage = $settings->reject(fn ($s) => $s->key === 'site.logo')->groupBy(fn ($s) => explode('.', $s->key)[0]);
    $knownPages = array_keys($tabs);
    $otherItems = $byPage->reject(fn ($items, $page) => in_array($page, $knownPages, true))->flatten(1);
    $currentLogo = \App\Models\Setting::get('site.logo');
?>

<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Site Content</h1>
        <p class="small text-secondary mb-0">Edit the copy, branding, and SEO settings of every public page. Changes go live immediately. Hero slides and testimonials have their own sections in the sidebar.</p>
    </div>
</div>

<form method="POST" action="<?php echo e(route('admin.content.update')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <ul class="nav nav-pills gap-1 mb-4 flex-wrap" id="contentTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-branding" type="button" role="tab"><i class="bi bi-palette me-1"></i>Branding</button>
        </li>
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($byPage->has($page)): ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-<?php echo e($page); ?>" type="button" role="tab"><i class="bi bi-<?php echo e($meta['icon']); ?> me-1"></i><?php echo e($meta['label']); ?></button>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($otherItems->count()): ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-other" type="button" role="tab"><i class="bi bi-three-dots me-1"></i>Other</button>
            </li>
        <?php endif; ?>
    </ul>

    <div class="tab-content">

        
        <div class="tab-pane fade show active" id="tab-branding" role="tabpanel">
            <div class="card-soft p-4 mb-4" style="max-width: 56rem;">
                <h6 class="font-display fw-bold text-navy">Logo</h6>
                <p class="small text-secondary">Shown in the header and footer of the public website. Leave empty to use the default “V” mark.</p>
                <div class="d-flex align-items-center gap-3 flex-wrap mt-2">
                    <div class="rounded-2 border d-flex align-items-center justify-content-center bg-white" style="width: 140px; height: 72px; overflow: hidden;">
                        <?php if($currentLogo): ?>
                            <img src="<?php echo e($currentLogo); ?>" alt="Current logo" style="max-width: 100%; max-height: 100%;">
                        <?php else: ?>
                            <span class="logo-mark">V</span>
                        <?php endif; ?>
                    </div>
                    <div class="flex-grow-1" style="min-width: 14rem;">
                        <input type="file" name="site_logo" accept="image/*" class="form-control">
                        <div class="form-text">PNG, JPG, WEBP or SVG — max 4 MB. A transparent PNG around 4:1 ratio works best.</div>
                        <?php if($currentLogo): ?>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="site_logo_remove" value="1" id="logoRemove">
                                <label class="form-check-label small" for="logoRemove">Remove current logo (revert to default “V” mark)</label>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        
        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $meta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($byPage->has($page)): ?>
                <div class="tab-pane fade" id="tab-<?php echo e($page); ?>" role="tabpanel">
                    <?php $__currentLoopData = $byPage[$page]->groupBy(fn ($s) => explode('.', $s->key)[1] ?? 'general'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-soft p-4 mb-4" style="max-width: 56rem;">
                            <h6 class="font-display fw-bold text-navy"><?php echo e($humanize($section)); ?></h6>
                            <div class="row g-3 mt-1">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $remainder = implode('.', array_slice(explode('.', $setting->key), 2));
                                        $label = $page === 'seo'
                                            ? ($seoLabels[str_replace('.', '_', $remainder)] ?? $humanize($remainder))
                                            : $humanize($remainder);
                                    ?>
                                    <div class="<?php echo e(strlen((string) $setting->value) > 60 ? 'col-12' : 'col-md-6'); ?>">
                                        <label class="form-label small fw-semibold text-secondary mb-1"><?php echo e($label); ?></label>
                                        <?php if(strlen((string) $setting->value) > 60): ?>
                                            <textarea name="settings[<?php echo e($setting->key); ?>]" rows="2" class="form-control form-control-sm"><?php echo e($setting->value); ?></textarea>
                                        <?php else: ?>
                                            <input name="settings[<?php echo e($setting->key); ?>]" class="form-control form-control-sm" value="<?php echo e($setting->value); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($otherItems->count()): ?>
            <div class="tab-pane fade" id="tab-other" role="tabpanel">
                <div class="card-soft p-4 mb-4" style="max-width: 56rem;">
                    <h6 class="font-display fw-bold text-navy">Other settings</h6>
                    <div class="row g-3 mt-1">
                        <?php $__currentLoopData = $otherItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="<?php echo e(strlen((string) $setting->value) > 60 ? 'col-12' : 'col-md-6'); ?>">
                                <label class="form-label small fw-semibold text-secondary mb-1"><?php echo e($humanize($setting->key)); ?></label>
                                <?php if(strlen((string) $setting->value) > 60): ?>
                                    <textarea name="settings[<?php echo e($setting->key); ?>]" rows="2" class="form-control form-control-sm"><?php echo e($setting->value); ?></textarea>
                                <?php else: ?>
                                    <input name="settings[<?php echo e($setting->key); ?>]" class="form-control form-control-sm" value="<?php echo e($setting->value); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="position-sticky bottom-0 py-3" style="background: var(--cream); z-index: 10;">
        <button class="btn-brand"><i class="bi bi-save"></i> Save all content</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\vectalabs\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>