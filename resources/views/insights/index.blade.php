@extends('layouts.app')

@section('title', 'Insights — Vectarlabs')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Insights']], 'dark' => true])

@include('partials.dark-hero', [
    'badge' => $S('insights.hero.badge', 'Insights'),
    'title1' => $S('insights.hero.title1', 'Thinking'),
    'title2' => $S('insights.hero.title2', 'that ships.'),
    'tagline' => $S('insights.hero.tagline', 'Field notes on engineering, security, design, and digital transformation — written by the team that builds the systems.'),
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Featured article</p>

        @if($featured = $posts->first())
            <a href="{{ route('insights.show', $featured->id) }}" class="text-decoration-none">
                <article class="card-soft hoverable overflow-hidden mt-3">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="abstract-panel panel-{{ substr($featured->cover_style, -1) }}" style="min-height: 20rem; border-radius: 0;"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-4 p-lg-5 d-flex flex-column justify-content-center h-100">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="tag-chip">{{ $featured->tag }}</span>
                                    <span class="small text-secondary">{{ $featured->created_at->format('d M Y') }}</span>
                                </div>
                                <h2 class="font-display fw-bold text-navy mt-3" style="font-size: clamp(1.4rem, 2.6vw, 2rem); line-height: 1.2;">{{ $featured->title }}</h2>
                                <p class="text-secondary mt-3 mb-4" style="font-size: 1.02rem; line-height: 1.7;">{{ $featured->excerpt }}</p>
                                <span class="btn-dark-pill align-self-start">Read Article <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
        @endif

        @if($posts->count() > 1)
            <p class="section-marker mt-5 pt-4">All articles</p>
            <div class="row g-4 mt-2">
                @foreach($posts->skip(1) as $post)
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
        @endif
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'PREFER TO TALK',
    'title2' => 'INSTEAD?',
    'subtitle' => 'Reading is good. A working session with our engineers is better — bring your hardest problem.',
    'buttonText' => 'Book a Session',
])
@endsection
