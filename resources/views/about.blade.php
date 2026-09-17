@extends('layouts.app')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

<section class="text-center" style="padding: 11rem 0 4rem;">
    <div class="container">
        <p class="text-secondary fw-bold" style="font-size: .72rem; letter-spacing: .25em; text-transform: uppercase;">{{ $S('about.hero.eyebrow', 'The Vectarlabs Story') }}</p>
        <h1 class="display-hero text-navy mx-auto mt-4" style="max-width: 46rem; font-size: clamp(2rem, 4.5vw, 3rem);">
            {{ $S('about.hero.title1', 'Our mission is to make work') }} <span class="text-brand">{{ $S('about.hero.title2', 'meaningful') }}</span>
        </h1>
        <p class="font-serif-body mx-auto mt-5 text-navy" style="max-width: 42rem; font-size: 1.5rem; line-height: 1.6;">{{ $S('about.hero.statement') }}</p>
    </div>
</section>

<section>
    <div class="container" style="max-width: 62rem;">
        <div class="row g-4 text-center border-top border-bottom py-5">
            @foreach([1, 2, 3] as $i)
                <div class="col-sm-4">
                    <div class="stat-value">{{ $S("about.stats.$i.value") }}</div>
                    <div class="stat-label">{{ $S("about.stats.$i.label") }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <h2 class="display-hero text-navy" style="font-size: 2rem;">Our values</h2>
        <p class="font-serif-body text-secondary mt-2" style="max-width: 36rem;">
            Discover the core principles that drive our engineering team, shape our software design,
            and guide us in delivering long-term value for our clients.
        </p>
        <div class="row g-5 mt-2">
            @foreach([
                ['cpu', 'Technical Innovation', 'We leverage modern stacks like React, Next.js, Django, and cloud API integrations to craft high-performance, future-proof platforms.'],
                ['flag', 'Engineering Excellence', 'We enforce high coding standards, clean database design, and robust automated testing to ensure software reliability and security.'],
                ['shield-check', 'Data Integrity & Privacy', 'We prioritize data privacy, rigorous vulnerability assessments, and regulatory compliance to safeguard critical organizational assets.'],
                ['people', 'Strategic Collaboration', 'We work closely with leadership and operational teams to build intuitive user experiences tailored precisely to daily workflows.'],
                ['diagram-3', 'Scalable Systems', 'We design cloud-native architectures optimized for high uptime, easy maintenance, and long-term cost efficiency.'],
                ['award', 'User-Centric Enablement', 'We provide thorough onboarding, complete documentation, and ongoing support so teams adopt new digital tools seamlessly.'],
            ] as [$icon, $title, $body])
                <div class="col-md-6 col-lg-4">
                    <span class="icon-chip"><i class="bi bi-{{ $icon }}"></i></span>
                    <h6 class="font-display fw-bold text-navy mt-3">{{ $title }}</h6>
                    <p class="small text-secondary">{{ $body }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 border-top" style="background: rgba(255,255,255,.6);">
    <div class="container" style="max-width: 72rem;">
        <h2 class="display-hero text-navy" style="font-size: 2rem;">Insights</h2>
        <p class="font-serif-body text-secondary mt-2">Stay informed with deep technical articles and software design perspectives.</p>
        <div class="row g-4 mt-2">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <article class="card-soft p-4">
                        <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;">{{ $post->tag }}</span>
                        <h5 class="font-display fw-bold text-navy mt-2">{{ $post->title }}</h5>
                        <p class="small text-secondary mb-0">{{ $post->excerpt }}</p>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('contact') }}" class="btn-brand">See all insights <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
