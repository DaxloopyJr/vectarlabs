@extends('layouts.app')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Team']], 'dark' => true])

@include('partials.dark-hero', [
    'badge' => $S('team.hero.badge', 'The People Behind The Platforms'),
    'title1' => $S('team.hero.title1', 'Meet the'),
    'title2' => $S('team.hero.title2', 'team'),
    'tagline' => $S('team.hero.tagline', 'A compact senior team of engineers, designers, and cloud specialists — every project led directly by the people who build it.'),
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Leadership &amp; Engineering</p>
        <div class="row g-4 mt-2">
            @foreach($members as $i => $m)
                <div class="col-md-6 col-lg-4">
                    <div class="card-soft hoverable p-4 text-center">
                        @if($m->photo_url)
                            <img src="{{ $m->photo_url }}" alt="{{ $m->name }}, {{ $m->role }} at Vectarlabs" class="rounded-2" style="width: 200px; height: 200px; object-fit: cover;" loading="lazy" decoding="async" width="200" height="200">
                        @else
                            <span class="avatar-initials {{ $i % 2 ? 'alt' : '' }}" style="width: 200px; height: 200px; font-size: 3.4rem;">{{ $m->initials() }}</span>
                        @endif
                        <h5 class="font-display fw-bold text-navy mt-3 mb-0">{{ $m->name }}</h5>
                        <p class="text-brand fw-bold text-uppercase mb-2" style="font-size: .72rem; letter-spacing: .12em;">{{ $m->role }}</p>
                        @if($m->bio)<p class="small text-secondary mb-0">{{ Str::limit($m->bio, 140) }}</p>@endif
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            @if($m->email)<a href="mailto:{{ $m->email }}" class="text-secondary"><i class="bi bi-envelope"></i></a>@endif
                            @if($m->linkedin)<a href="{{ $m->linkedin }}" target="_blank" class="text-secondary"><i class="bi bi-linkedin"></i></a>@endif
                            @if($m->twitter)<a href="{{ $m->twitter }}" target="_blank" class="text-secondary"><i class="bi bi-twitter-x"></i></a>@endif
                            @if($m->github)<a href="{{ $m->github }}" target="_blank" class="text-secondary"><i class="bi bi-github"></i></a>@endif
                        </div>
                        <a href="{{ route('team.show', $m->slug) }}" class="small fw-bold text-brand text-decoration-none d-inline-block mt-3">View full profile <i class="bi bi-arrow-right"></i></a>
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
