@extends('layouts.app')

@section('title', 'Insights — Vectarlabs')

@section('content')
@include('partials.dark-hero', [
    'badge' => 'Insights & Perspectives',
    'title1' => 'THINKING THAT SHAPES',
    'title2' => 'BETTER SYSTEMS',
    'tagline' => 'Field notes on engineering, design, security, and digitization from the team building platforms across East Africa.',
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">All articles</p>
        <div class="row g-4 mt-2">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('insights.show', $post->id) }}" class="text-decoration-none">
                        <article class="card-soft hoverable overflow-hidden">
                            <div class="abstract-panel panel-{{ substr($post->cover_style, -1) }}" style="height: 11rem; border-radius: 0;"></div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="tag-chip">{{ $post->tag }}</span>
                                    <span class="small text-secondary">{{ $post->created_at->format('d M Y') }}</span>
                                </div>
                                <h6 class="font-display fw-bold text-navy mt-3">{{ $post->title }}</h6>
                                <p class="small text-secondary mb-0">{{ $post->excerpt }}</p>
                            </div>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'HAVE A PROJECT',
    'title2' => 'IN MIND?',
    'subtitle' => 'Our best articles come from real engagements. Start yours today.',
    'buttonText' => 'Book Consultation',
])
@endsection
