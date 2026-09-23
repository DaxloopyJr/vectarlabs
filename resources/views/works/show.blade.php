@extends('layouts.app', ['seoDescription' => $work->summary])

@section('title', $work->title . ' — Vectarlabs')

@section('content')
@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Our Work', 'url' => route('works')], ['label' => \Illuminate\Support\Str::limit($work->title, 40)]], 'dark' => true])

<section class="hero-dark">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <span class="hero-badge">{{ $work->category }}</span>
            <span class="hero-badge">{{ $work->industry }}</span>
            <span class="hero-badge">{{ $work->year }}</span>
        </div>
        <h1 class="display-hero text-white mx-auto mt-4" style="max-width: 56rem; font-size: clamp(2.2rem, 5vw, 3.8rem);">{{ $work->title }}</h1>
        <p class="mx-auto mt-4 text-white-50" style="max-width: 42rem;">{{ $work->summary }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <div class="row g-5">
            <div class="col-lg-7">
                <p class="section-marker">Case study</p>
                @foreach($work->paragraphs() as $para)
                    <p class="font-serif-body text-secondary mt-3" style="font-size: 1.05rem; line-height: 1.75;">{{ $para }}</p>
                @endforeach
                <div class="d-flex flex-wrap gap-2 mt-4">
                    @foreach($work->tagList() as $tag)
                        <span class="tag-chip">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card-soft p-4 sticky-top" style="top: 7rem;">
                    <h6 class="font-display fw-bold text-navy">Project facts</h6>
                    <dl class="row small mt-3 mb-4">
                        <dt class="col-4 text-secondary">Client</dt><dd class="col-8 fw-semibold">{{ $work->client }}</dd>
                        <dt class="col-4 text-secondary">Industry</dt><dd class="col-8 fw-semibold">{{ $work->industry }}</dd>
                        <dt class="col-4 text-secondary">Engagement</dt><dd class="col-8 fw-semibold">{{ $work->category }}</dd>
                        <dt class="col-4 text-secondary">Year</dt><dd class="col-8 fw-semibold">{{ $work->year }}</dd>
                    </dl>
                    <a href="{{ route('contact') }}" class="btn-brand w-100 justify-content-center" style="padding: .7rem 1rem;">Discuss your project</a>
                </div>
            </div>
        </div>

        @if($moreWorks->count())
            <p class="section-marker mt-5 pt-4">More of our work</p>
            <div class="row g-4 mt-2">
                @foreach($moreWorks as $w)
                    <div class="col-md-4">
                        <a href="{{ route('works.show', $w->slug) }}" class="text-decoration-none">
                            <div class="card-soft hoverable p-4">
                                <span class="text-brand fw-bold" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;">{{ $w->category }}</span>
                                <h6 class="font-display fw-bold text-navy mt-2">{{ $w->title }}</h6>
                                <p class="small text-secondary mb-0">{{ Str::limit($w->summary, 100) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'READY TO BE OUR NEXT',
    'title2' => 'CASE STUDY?',
    'subtitle' => 'Tell us about your platform, portal, or product — we respond within one business day.',
    'buttonText' => 'Start a Conversation',
])
@endsection
