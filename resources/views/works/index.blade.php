@extends('layouts.app')

@section('title', 'Our Work — Vectarlabs')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Our Work']], 'dark' => true])

@include('partials.dark-hero', [
    'badge' => $S('works.hero.badge', 'Proven Delivery'),
    'title1' => $S('works.hero.title1', 'Work that speaks'),
    'title2' => $S('works.hero.title2', 'in results'),
    'tagline' => $S('works.hero.tagline', 'Case studies of platforms we designed, shipped, and still support today — across education, finance, agriculture, health, and enterprise.'),
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('works.marker', 'Case studies') }}</p>
        <div class="row g-4 mt-2">
            @foreach($works as $w)
                <div class="col-md-6">
                    <a href="{{ route('works.show', $w->slug) }}" class="text-decoration-none">
                        <div class="card-soft hoverable overflow-hidden">
                            <div class="hero-slider d-flex align-items-end justify-content-between p-4" style="padding: 2rem 1.5rem 1.5rem; min-height: 10rem; text-align: left;">
                                <span class="type-badge saas">{{ $w->category }}</span>
                                <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 2.2rem; height: 2.2rem; border: 1px solid rgba(255,255,255,.2); color: #fff;">
                                    <i class="bi bi-arrow-up-right"></i>
                                </span>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-center small text-secondary">
                                    <span>{{ $w->industry }}</span>
                                    <span>{{ $w->year }} @if($w->featured) · <i class="bi bi-star-fill text-brand"></i> Featured @endif</span>
                                </div>
                                <h5 class="font-display fw-bold text-navy mt-2">{{ $w->title }}</h5>
                                <p class="small text-secondary">{{ $w->summary }}</p>
                                <span class="small fw-bold text-navy">View case study <i class="bi bi-arrow-right text-brand"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'WANT RESULTS LIKE',
    'title2' => 'THESE?',
    'subtitle' => 'Every project above started with a conversation. Tell us about the system you need.',
    'buttonText' => 'Start Your Project',
])
@endsection
