@extends('layouts.app', ['seoDescription' => \Illuminate\Support\Str::limit($member->bio, 155)])

@section('title', $member->name . ' — Vectarlabs Team')

@section('content')
@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Team', 'url' => route('team')], ['label' => $member->name]], 'dark' => true])

<section class="hero-dark" style="padding-bottom: 4rem;">
    <div class="container">
        <span class="hero-badge">Team Member</span>
        <div class="mt-4">
            @if($member->photo_url)
                <img src="{{ $member->photo_url }}" alt="{{ $member->name }}, {{ $member->role }} at Vectarlabs" class="rounded-2 border border-2 border-light" style="width: 240px; height: 240px; object-fit: cover;" width="240" height="240" fetchpriority="high">
            @else
                <span class="avatar-initials" style="width: 240px; height: 240px; font-size: 4.5rem;">{{ $member->initials() }}</span>
            @endif
        </div>
        <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(2rem, 5vw, 3.4rem);">{{ $member->name }}</h1>
        <p class="text-brand fw-bold text-uppercase mt-2" style="font-size: .8rem; letter-spacing: .18em;">{{ $member->role }}</p>
        <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
            @if($member->email)<a href="mailto:{{ $member->email }}" class="hero-chip text-decoration-none"><i class="bi bi-envelope me-1"></i>{{ $member->email }}</a>@endif
            @if($member->phone)<a href="tel:{{ $member->phone }}" class="hero-chip text-decoration-none"><i class="bi bi-telephone me-1"></i>{{ $member->phone }}</a>@endif
            @if($member->website)<a href="{{ $member->website }}" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-globe me-1"></i>Website</a>@endif
            @if($member->linkedin)<a href="{{ $member->linkedin }}" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-linkedin me-1"></i>LinkedIn</a>@endif
            @if($member->twitter)<a href="{{ $member->twitter }}" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-twitter-x me-1"></i>X / Twitter</a>@endif
            @if($member->github)<a href="{{ $member->github }}" target="_blank" class="hero-chip text-decoration-none"><i class="bi bi-github me-1"></i>GitHub</a>@endif
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 44rem;">
        <p class="section-marker">Biography</p>
        @php($paragraphs = array_values(array_filter(array_map('trim', preg_split('/\n+/', (string) $member->bio)))))
        @foreach($paragraphs as $para)
            <p class="font-serif-body text-secondary mt-3" style="font-size: 1.08rem; line-height: 1.85;">{{ $para }}</p>
        @endforeach
        <a href="{{ route('team') }}" class="fw-bold text-brand text-decoration-none d-inline-block mt-4"><i class="bi bi-arrow-left"></i> Back to the team</a>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'WANT TO WORK WITH',
    'title2' => strtoupper(explode(' ', $member->name)[0]) . '\'S TEAM?',
    'subtitle' => 'Every project is led directly by the people who build it. Tell us what you are planning.',
    'buttonText' => 'Start a Conversation',
])
@endsection
