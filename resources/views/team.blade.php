@extends('layouts.app')

@section('content')
@include('partials.dark-hero', [
    'badge' => 'The People Behind The Platforms',
    'title1' => 'MEET THE',
    'title2' => 'TEAM',
    'tagline' => 'A compact senior team of engineers, designers, and cloud specialists — every project led directly by the people who build it.',
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Leadership &amp; Engineering</p>
        <div class="row g-4 mt-2">
            @foreach($members as $i => $m)
                <div class="col-md-6 col-lg-4">
                    <div class="card-soft p-4">
                        @if($m->photo_url)
                            <img src="{{ $m->photo_url }}" alt="{{ $m->name }}" class="rounded-4" style="width: 64px; height: 64px; object-fit: cover;">
                        @else
                            <span class="avatar-initials {{ $i % 2 ? 'alt' : '' }}">{{ $m->initials() }}</span>
                        @endif
                        <h5 class="font-display fw-bold text-navy mt-3 mb-0">{{ $m->name }}</h5>
                        <p class="text-brand fw-bold text-uppercase mb-2" style="font-size: .72rem; letter-spacing: .12em;">{{ $m->role }}</p>
                        @if($m->bio)<p class="small text-secondary mb-0">{{ $m->bio }}</p>@endif
                        @if($m->linkedin)
                            <a href="{{ $m->linkedin }}" target="_blank" class="small fw-semibold text-secondary d-inline-flex align-items-center gap-1 mt-3">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'WANT TO BUILD WITH',
    'title2' => 'THIS TEAM?',
    'subtitle' => "We're always interested in ambitious projects — and ambitious people. Reach out and let's talk.",
    'buttonText' => 'Start a Conversation',
])
@endsection
