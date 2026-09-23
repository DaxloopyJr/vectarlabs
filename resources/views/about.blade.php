@extends('layouts.app')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'About Us']]])

<section class="text-center" style="padding: 4rem 0 4rem;">
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
        <h2 class="display-hero text-navy" style="font-size: 2rem; text-transform: none;">{{ $S('about.values.title', 'Our values') }}</h2>
        <p class="font-serif-body text-secondary mt-2" style="max-width: 36rem;">
            {{ $S('about.values.subtitle', 'Discover the core principles that drive our engineering team, shape our software design, and guide us in delivering long-term value for our clients.') }}
        </p>
        <div class="row g-5 mt-2">
            @foreach([1, 2, 3, 4, 5, 6] as $i)
                <div class="col-md-6 col-lg-4">
                    <span class="icon-chip"><i class="bi bi-{{ $S("about.values.$i.icon", 'cpu') }}"></i></span>
                    <h6 class="font-display fw-bold text-navy mt-3">{{ $S("about.values.$i.title") }}</h6>
                    <p class="small text-secondary">{{ $S("about.values.$i.body") }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5 border-top" style="background: rgba(255,255,255,.6);">
    <div class="container" style="max-width: 72rem;">
        <h2 class="display-hero text-navy" style="font-size: 2rem; text-transform: none;">{{ $S('about.insights.title', 'Insights') }}</h2>
        <p class="font-serif-body text-secondary mt-2">{{ $S('about.insights.subtitle', 'Stay informed with deep technical articles and software design perspectives.') }}</p>
        <div class="row g-4 mt-2">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <a href="{{ route('insights.show', $post->id) }}" class="text-decoration-none">
                        <article class="card-soft hoverable p-4">
                            <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;">{{ $post->tag }}</span>
                            <h5 class="font-display fw-bold text-navy mt-2">{{ $post->title }}</h5>
                            <p class="small text-secondary mb-0">{{ $post->excerpt }}</p>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('insights') }}" class="btn-brand">See all insights <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
