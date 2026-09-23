<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vectarlabs — Software · Cloud · Design')</title>

    {{-- Performance: preconnect to CDNs, defer non-critical CSS --}}
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"></noscript>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('partials.seo')
</head>
<body>
    <div class="page-loader" id="pageLoader" aria-hidden="true">
        <span class="loader-mark">V</span>
        <div class="loader-track"></div>
    </div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script>
        window.addEventListener('load', function () {
            setTimeout(function () { document.getElementById('pageLoader').classList.add('done'); }, 350);
        });
    </script>
    @stack('scripts')

    {{-- Google Analytics 4 (set the measurement ID in Admin → Site Content → seo.ga4_id) --}}
    @php($ga4 = \App\Models\Setting::get('seo.ga4_id'))
    @if($ga4)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga4 }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $ga4 }}');
        </script>
    @endif
</body>
</html>
