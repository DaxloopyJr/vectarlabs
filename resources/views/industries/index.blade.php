@extends('layouts.app')

@section('title', 'Industries — Vectarlabs')

@section('content')
@include('partials.dark-hero', [
    'badge' => 'Sector Expertise',
    'title1' => 'TECHNOLOGY SHAPED FOR',
    'title2' => 'YOUR INDUSTRY',
    'tagline' => 'We build systems around the realities of each sector — not generic templates. Explore the industries we serve.',
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Industries we serve</p>
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
    'subtitle' => 'We take on select projects outside our core sectors when the problem is interesting. Tell us about yours.',
    'buttonText' => 'Start a Conversation',
])
@endsection
