@extends('layouts.app')

@section('title', 'Industries — Vectarlabs')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Industries']], 'dark' => true])

@include('partials.dark-hero', [
    'badge' => $S('industries.hero.badge', 'Industries We Serve'),
    'title1' => $S('industries.hero.title1', 'Deep expertise in'),
    'title2' => $S('industries.hero.title2', 'your sector.'),
    'tagline' => $S('industries.hero.tagline', 'From classrooms to cooperatives, clinics to checkout counters — we build software shaped by the realities of each industry we serve.'),
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('industries.marker', 'Industries we serve') }}</p>
        <div class="row g-4 mt-2">
            @foreach($industries as $ind)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('industries.show', $ind->slug) }}" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <span class="icon-chip mb-3"><i class="bi {{ $ind->iconClass() }}"></i></span>
                            <h5 class="font-display fw-bold text-navy">{{ $ind->name }}</h5>
                            <p class="text-brand fw-semibold small mb-2">{{ $ind->tagline }}</p>
                            <p class="small text-secondary">{{ $ind->summary }}</p>
                            <span class="small fw-bold text-navy">Explore solutions <i class="bi bi-arrow-right text-brand"></i></span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'YOUR INDUSTRY',
    'title2' => 'NOT LISTED?',
    'subtitle' => "If you run operations, we can digitize them. Tell us about your sector and we'll show you what's possible.",
    'buttonText' => 'Start the Conversation',
])
@endsection
