{{--
    SEO meta partial. Views may set any of these before extending the layout:
      $seoTitle, $seoDescription, $seoKeywords, $seoImage, $seoType,
      $seoCanonical, $seoRobots, $seoJsonLd (array of schema graphs)
--}}
@php
    $S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d);
    $seoSiteName    = $S('seo.site_name', 'Vectarlabs');
    $seoTitle       = trim($__env->yieldContent('title')) ?: ($seoTitle ?? $S('seo.default_title', 'Vectarlabs — Software · Cloud · Design'));
    $seoDescription = $seoDescription ?? $S('seo.default_description', 'Vectarlabs designs, builds, and maintains web platforms, management systems, mobile applications, and cloud infrastructure for institutions and enterprises across Africa and beyond.');
    $seoKeywords    = $seoKeywords ?? $S('seo.default_keywords', 'software development, web platforms, cloud infrastructure, mobile apps, school management systems, Kenya, East Africa');
    $seoImage       = $seoImage ?? ($S('seo.default_image') ? url($S('seo.default_image')) : url('css/../favicon.ico'));
    $seoType        = $seoType ?? 'website';
    $seoCanonical   = $seoCanonical ?? url()->current();
    $seoRobots      = $seoRobots ?? 'index, follow';
@endphp
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="robots" content="{{ $seoRobots }}">
<meta name="author" content="{{ $seoSiteName }}">
<link rel="canonical" href="{{ $seoCanonical }}">

{{-- Open Graph --}}
<meta property="og:site_name" content="{{ $seoSiteName }}">
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:locale" content="en_US">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">
@if($S('seo.twitter_handle'))<meta name="twitter:site" content="{{ $S('seo.twitter_handle') }}">@endif

{{-- Structured data (JSON-LD) --}}
<script type="application/ld+json">
{!! json_encode([
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
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@if(request()->routeIs('home'))
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $seoSiteName,
    'url' => url('/'),
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endif
@foreach($seoJsonLd ?? [] as $graph)
<script type="application/ld+json">{!! json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endforeach

{{-- Google Search Console verification --}}
@if($S('seo.gsc_verification'))
<meta name="google-site-verification" content="{{ $S('seo.gsc_verification') }}">
@endif
