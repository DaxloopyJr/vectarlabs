@extends('layouts.app')

@section('title', $industry->name . ' — Vectarlabs')

@section('content')
<section class="hero-dark">
    <div class="container">
        <span class="hero-badge">Industry Focus</span>
        <h1 class="display-hero text-white mx-auto mt-4" style="max-width: 56rem; font-size: clamp(2.2rem, 5vw, 3.8rem);">
            {{ $industry->name }}
        </h1>
        <p class="mx-auto mt-4 text-white-50" style="max-width: 42rem;">{{ $industry->tagline }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <div class="row g-5">
            <div class="col-lg-7">
                <p class="section-marker">Overview</p>
                @foreach($industry->paragraphs() as $para)
                    <p class="font-serif-body text-secondary mt-3" style="font-size: 1.05rem; line-height: 1.75;">{{ $para }}</p>
                @endforeach
            </div>
            <div class="col-lg-5">
                <div class="card-soft p-4 sticky-top" style="top: 7rem;">
                    <h6 class="font-display fw-bold text-navy">What we deliver</h6>
                    <ul class="list-unstyled d-grid gap-2 mt-3 mb-4">
                        @foreach($industry->offeringList() as $offering)
                            <li class="d-flex gap-2 small">
                                <i class="bi bi-check-circle-fill text-brand"></i>
                                <span>{{ $offering }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('contact') }}" class="btn-brand w-100 justify-content-center" style="padding: .7rem 1rem;">Discuss your project</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'READY TO MODERNIZE',
    'title2' => 'YOUR OPERATIONS?',
    'subtitle' => 'Tell us where your current systems fall short — we will map a practical digitization roadmap for your sector.',
    'buttonText' => 'Get Technical Assessment',
])
@endsection
