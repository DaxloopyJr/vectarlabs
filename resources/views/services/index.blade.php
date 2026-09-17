@extends('layouts.app')

@section('content')
@include('partials.dark-hero', [
    'badge' => 'What We Do',
    'title1' => 'OUR',
    'title2' => 'SERVICES',
    'tagline' => 'End-to-end digital engineering — from product strategy and design to software development, cloud infrastructure, and managed support.',
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Service Catalog</p>
        <h2 class="display-hero text-navy mt-3" style="max-width: 42rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem);">Four practices. One accountable engineering partner.</h2>

        <div class="d-grid gap-4 mt-5">
            @foreach($services as $i => $s)
                <a href="{{ route('services.show', $s->slug) }}" class="text-decoration-none">
                    <div class="card-soft hoverable p-4 p-md-5 d-flex flex-column flex-lg-row align-items-lg-center gap-4">
                        <div class="display-hero" style="font-size: 2rem; color: rgba(255,107,26,.25);">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="flex-grow-1">
                            <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .2em; text-transform: uppercase;">{{ $s->badge }}</span>
                            <h3 class="font-display fw-black text-navy text-capitalize mt-1" style="font-weight: 900;">{{ strtolower($s->title_line1.' '.$s->title_line2) }}</h3>
                            <p class="small text-secondary mb-0" style="max-width: 42rem;">{{ $s->summary }}</p>
                        </div>
                        <span class="font-display fw-bold text-brand text-uppercase" style="font-size: .78rem; letter-spacing: .14em;">
                            View service <i class="bi bi-arrow-up-right"></i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'NOT SURE WHICH SERVICE',
    'title2' => 'FITS YOUR NEEDS?',
    'subtitle' => "Book a free technical consultation and we'll map your requirements to the right engineering practice.",
    'buttonText' => 'Talk to an Engineer',
])
@endsection
