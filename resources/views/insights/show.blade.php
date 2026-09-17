@extends('layouts.app')

@section('title', $post->title . ' — Vectarlabs Insights')

@section('content')
<section class="hero-dark" style="padding-bottom: 4rem;">
    <div class="container" style="max-width: 48rem;">
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
            <span class="hero-badge">{{ $post->tag }}</span>
            <span class="small text-white-50">{{ $post->created_at->format('d F Y') }}</span>
        </div>
        <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(1.8rem, 4.5vw, 3rem);">{{ $post->title }}</h1>
        <p class="mx-auto mt-4 text-white-50 font-serif-body" style="max-width: 40rem;">{{ $post->excerpt }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 44rem;">
        @php($paragraphs = array_values(array_filter(array_map('trim', preg_split('/\n+/', (string) ($post->body ?: $post->excerpt))))))
        @foreach($paragraphs as $para)
            <p class="font-serif-body text-secondary" style="font-size: 1.08rem; line-height: 1.85;">{{ $para }}</p>
        @endforeach

        @if($morePosts->count())
            <p class="section-marker mt-5 pt-4">Keep reading</p>
            <div class="row g-4 mt-2">
                @foreach($morePosts as $p)
                    <div class="col-md-4">
                        <a href="{{ route('insights.show', $p->id) }}" class="text-decoration-none">
                            <div class="card-soft hoverable p-4">
                                <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;">{{ $p->tag }}</span>
                                <h6 class="font-display fw-bold text-navy mt-2 mb-0">{{ $p->title }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
