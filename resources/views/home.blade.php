@extends('layouts.app')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))
@php($slides = [
    [
        'badge' => $S('home.hero.eyebrow', 'Software · Cloud · Design'),
        'title1' => $S('home.hero.title1', 'Building High-Impact'),
        'title2' => $S('home.hero.title2', 'Digital Infrastructure for'),
        'title3' => $S('home.hero.title3', 'Growing Enterprises'),
        'lead' => $S('home.hero.subtitle'),
        'cta' => $S('home.hero.button', 'Book Consultation'),
        'to' => route('contact'),
        'chips' => ['Custom Web Platforms', 'Cloud Infrastructure', 'Mobile Applications'],
    ],
    [
        'badge' => 'Software In Stock',
        'title1' => 'Ready-made products,',
        'title2' => 'deployed',
        'title3' => 'in days.',
        'lead' => 'SaaS subscriptions and standalone licenses for school management, SACCO operations, retail POS, clinics, and field data — proven platforms, not promises.',
        'cta' => 'Explore Products',
        'to' => route('products'),
        'chips' => ['EduSphere SMS', 'SaccoFlow', 'StockPilot Pro'],
    ],
    [
        'badge' => 'Sector Expertise',
        'title1' => 'Technology shaped',
        'title2' => 'for',
        'title3' => 'your industry.',
        'lead' => 'Education, agriculture, fintech, health, enterprise, and NGOs — we build systems around the realities of each sector, not generic templates.',
        'cta' => 'Explore Industries',
        'to' => route('industries'),
        'chips' => ['Education', 'AgriTech', 'Fintech & SACCOs'],
    ],
    [
        'badge' => 'Proven Delivery',
        'title1' => 'Work that speaks',
        'title2' => 'in',
        'title3' => 'results.',
        'lead' => 'From 12-campus school groups to 40,000-member SACCOs — browse case studies of platforms we designed, shipped, and still support today.',
        'cta' => 'See Our Work',
        'to' => route('works'),
        'chips' => ['25+ Projects', '99.4% Uptime', '1M+ Daily Requests'],
    ],
])

{{-- Hero slider --}}
<section class="hero-slider">
    <div class="container">
        <div class="hero-slides-wrap mx-auto" style="max-width: 52rem;">
            @foreach($slides as $i => $slide)
                <div class="hero-slide {{ $i ? 'hidden-slide' : '' }}" data-slide="{{ $i }}">
                    <span class="hero-badge">{{ $slide['badge'] }}</span>
                    <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(2rem, 5.5vw, 3.6rem);">
                        {{ $slide['title1'] }}<br>
                        {{ $slide['title2'] }} <span class="text-brand">{{ $slide['title3'] }}</span>
                    </h1>
                    <p class="font-serif-body mx-auto mt-4" style="max-width: 38rem; color: rgba(255,255,255,.65);">{{ $slide['lead'] }}</p>
                    <a href="{{ $slide['to'] }}" class="btn-brand mt-4">{{ $slide['cta'] }} <i class="bi bi-arrow-right"></i></a>
                    <div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
                        @foreach($slide['chips'] as $chip)
                            <span class="hero-chip">{{ $chip }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
            <button class="slider-arrow" id="slidePrev" aria-label="Previous slide"><i class="bi bi-chevron-left"></i></button>
            <div class="d-flex gap-2">
                @foreach($slides as $i => $slide)
                    <button class="slider-dot {{ $i ? '' : 'active' }}" data-goto="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                @endforeach
            </div>
            <button class="slider-arrow" id="slideNext" aria-label="Next slide"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">What we do</p>
        <div class="row align-items-end g-4 mt-1">
            <div class="col-md-7">
                <h2 class="display-hero text-navy" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem);">{{ $S('home.services.title') }}</h2>
            </div>
            <div class="col-md-5 text-md-end">
                <p class="font-serif-body text-secondary mb-0">We partner with ambitious institutions to design, build, and maintain the digital systems their missions depend on.</p>
            </div>
        </div>
        <div class="row g-4 mt-2">
            @foreach($services as $s)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('services.show', $s->slug) }}" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="font-display fw-bold text-navy text-capitalize">{{ strtolower($s->title_line1.' '.$s->title_line2) }}</h5>
                                <i class="bi bi-arrow-up-right text-brand"></i>
                            </div>
                            <p class="small text-secondary mt-2 mb-0">{{ $s->summary }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('services') }}" class="text-decoration-none">
                    <div class="card-soft hoverable p-4 d-flex align-items-center justify-content-center text-center" style="border-style: dashed; background: #fff8f2;">
                        <span class="font-display fw-bold text-brand">Explore all services <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Industries --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker centered">Industries</p>
        <h2 class="display-hero text-navy text-center mx-auto mt-3" style="max-width: 42rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem);">{{ $S('home.sectors.title') }}</h2>
        <div class="row g-4 mt-3">
            @foreach($industries as $ind)
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('industries.show', $ind->slug) }}" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <span class="icon-chip mb-3"><i class="bi {{ $ind->iconClass() }}"></i></span>
                            <h6 class="font-display fw-bold text-navy">{{ $ind->name }}</h6>
                            <p class="small text-secondary mb-0">{{ $ind->summary }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <p class="text-center mt-4"><a href="{{ route('industries') }}" class="fw-bold text-brand text-decoration-none">Explore all industries <i class="bi bi-arrow-right"></i></a></p>
    </div>
</section>

{{-- Testimonial + stats --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Trusted by technology &amp; operational leaders</p>
        <div class="row align-items-center g-5 mt-1">
            <div class="col-lg-6">
                <i class="bi bi-quote fs-1 text-brand"></i>
                <blockquote class="font-serif-body text-navy" style="font-size: 1.35rem; line-height: 1.6;">
                    “{{ $S('home.testimonial.quote') }}”
                </blockquote>
                <p class="font-display fw-bold text-navy mt-4 mb-0">{{ $S('home.testimonial.author') }}</p>
                <p class="small text-secondary">{{ $S('home.testimonial.role') }}</p>
            </div>
            <div class="col-lg-6"><div class="abstract-panel panel-b" style="height: 18rem;"></div></div>
        </div>
        <div class="card-soft row g-4 text-center px-4 py-5 mt-5 mx-0">
            @foreach([1, 2, 3] as $i)
                <div class="col-sm-4">
                    <div class="stat-value">{{ $S("home.stats.$i.value") }}</div>
                    <div class="stat-label">{{ $S("home.stats.$i.label") }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Approach --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('home.approach.title', 'Our approach') }}</p>
        <div class="row g-5 mt-1">
            <div class="col-lg-6"><div class="abstract-panel panel-a" style="height: 20rem;"></div></div>
            <div class="col-lg-6">
                <ol class="list-unstyled d-grid gap-4">
                    @foreach([
                        ['Operational Audit & Discovery', 'Assess existing workflows, identify structural risks, and map clear digitization goals.'],
                        ['Custom Architecture & Integration', 'Design bespoke systems and integrations — including M-Pesa APIs and cloud infrastructure — built for your context.'],
                        ['User Training & Onboarding', 'Conduct hands-on workshops and provide clear documentation for smooth adoption.'],
                        ['Deployment & Managed Support', 'Go live with cloud hosting, automated backups, and guaranteed high uptime.'],
                    ] as $i => [$step, $body])
                        <li class="d-flex gap-3">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle border border-warning font-display fw-bold text-brand flex-shrink-0" style="width: 2.2rem; height: 2.2rem;">{{ $i + 1 }}</span>
                            <div>
                                <h6 class="font-display fw-bold text-navy mb-1">{{ $step }}</h6>
                                <p class="small text-secondary mb-0">{{ $body }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
                <a href="{{ route('contact') }}" class="btn-dark-pill mt-4 ms-5">Start your project</a>
            </div>
        </div>
    </div>
</section>

{{-- Insights --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <div class="d-flex justify-content-between align-items-end">
            <div>
                <p class="section-marker">Insights</p>
                <h2 class="display-hero text-navy mt-3 mb-0" style="font-size: clamp(1.8rem, 3.5vw, 2.4rem);">Latest thinking in technology &amp; digital design</h2>
            </div>
            <a href="{{ route('insights') }}" class="fw-bold text-brand text-decoration-none d-none d-md-inline">View all articles <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-4 mt-2">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <a href="{{ route('insights.show', $post->id) }}" class="text-decoration-none">
                        <article class="card-soft hoverable overflow-hidden">
                            <div class="abstract-panel panel-{{ substr($post->cover_style, -1) }}" style="height: 11rem; border-radius: 0;"></div>
                            <div class="p-4">
                                <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;">{{ $post->tag }}</span>
                                <h6 class="font-display fw-bold text-navy mt-2">{{ $post->title }}</h6>
                                <p class="small text-secondary mb-0">{{ $post->excerpt }}</p>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pb-5">
    <div class="container" style="max-width: 72rem;">
        <div class="bg-navy-deep rounded-4 text-center px-4 py-5 my-4">
            <h2 class="display-hero text-white mx-auto" style="max-width: 42rem; font-size: clamp(1.7rem, 3.5vw, 2.4rem);">{{ $S('home.cta.title') }}</h2>
            <p class="mx-auto mt-3 text-white-50" style="max-width: 36rem;">{{ $S('home.cta.subtitle') }}</p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a href="{{ route('contact') }}" class="btn-brand">{{ $S('home.cta.button', 'Book Consultation') }} <i class="bi bi-arrow-right"></i></a>
                <a href="{{ route('services') }}" class="btn btn-outline-light rounded-pill px-4 py-3 font-display fw-bold text-uppercase" style="font-size: .78rem; letter-spacing: .14em;">Explore capabilities</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
(function () {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    if (!slides.length) return;
    let idx = 0;
    function show(i) {
        idx = (i + slides.length) % slides.length;
        slides.forEach((s, n) => s.classList.toggle('hidden-slide', n !== idx));
        dots.forEach((d, n) => d.classList.toggle('active', n === idx));
    }
    setInterval(() => show(idx + 1), 6000);
    document.getElementById('slidePrev').addEventListener('click', () => show(idx - 1));
    document.getElementById('slideNext').addEventListener('click', () => show(idx + 1));
    dots.forEach((d) => d.addEventListener('click', () => show(+d.dataset.goto)));
})();
</script>
@endpush
