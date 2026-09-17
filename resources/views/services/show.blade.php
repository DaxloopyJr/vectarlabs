@extends('layouts.app')

@section('content')
@include('partials.dark-hero', [
    'badge' => $service->badge,
    'title1' => $service->title_line1,
    'title2' => $service->title_line2,
    'tagline' => $service->tagline,
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <div class="row g-5">
            <div class="col-lg-4">
                @if($service->list_title)
                    <h6 class="font-display fw-bold text-brand text-uppercase" style="font-size: .8rem; letter-spacing: .2em;">{{ $service->list_title }}</h6>
                    <ul class="list-unstyled d-grid gap-2 mt-3">
                        @foreach($service->listItemsArray() as $item)
                            <li class="d-flex gap-2 small text-secondary"><i class="bi bi-dot fs-5 lh-1"></i>{{ $item }}</li>
                        @endforeach
                    </ul>
                @endif
                @if($service->stack_label)
                    <div class="border-top mt-4 pt-4">
                        <h6 class="font-display fw-bold text-brand text-uppercase" style="font-size: .8rem; letter-spacing: .2em;">{{ $service->stack_label }}</h6>
                        <p class="font-serif-body small text-secondary mt-2">{{ $service->stack_text }}</p>
                    </div>
                @endif
                @if($service->hero_button_text)
                    <a href="{{ route('contact') }}" class="btn-brand mt-3">{{ $service->hero_button_text }} <i class="bi bi-arrow-right"></i></a>
                @endif
            </div>
            <div class="col-lg-8">
                <p class="section-marker">Overview</p>
                <h2 class="display-hero text-navy mt-3" style="font-size: clamp(1.7rem, 3.2vw, 2.4rem);">{{ $service->overview_title }}</h2>
                <p class="font-serif-body text-secondary mt-4" style="font-size: 1.02rem; line-height: 1.75;">{{ $service->overview_body1 }}</p>
                <p class="font-serif-body text-secondary mt-3" style="font-size: 1.02rem; line-height: 1.75;">{{ $service->overview_body2 }}</p>
            </div>
        </div>
    </div>
</section>

@if($service->cards->isNotEmpty())
<section class="pb-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $service->cards_section_title }}</p>
        <div class="row g-4 mt-2">
            @foreach($service->cards as $i => $card)
                <div class="col-sm-6 col-lg-{{ $service->cards->count() >= 4 ? '3' : '4' }}">
                    <div class="card-soft p-4">
                        @if($service->cards->count() >= 4)
                            <div class="font-display fw-black text-brand" style="font-size: 1.5rem; font-weight: 900;">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        @else
                            <span class="icon-chip"><i class="bi bi-{{ match($card->icon) { 'compass' => 'compass', 'layout' => 'layout-window', 'rocket' => 'rocket-takeoff', 'smartphone' => 'phone', 'globe' => 'globe2', 'dashboard' => 'speedometer2', 'users' => 'people', 'layers' => 'layers', 'target' => 'bullseye', 'cloud' => 'cloud', 'shield' => 'shield-check', 'database' => 'database', default => 'code-slash' } }}"></i></span>
                        @endif
                        <h6 class="font-display fw-bold text-navy mt-3">{{ $card->title }}</h6>
                        <p class="small text-secondary mb-0">{{ $card->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@include('partials.cta-band', [
    'title1' => $service->cta_title1,
    'title2' => $service->cta_title2,
    'subtitle' => $service->cta_subtitle,
    'buttonText' => $service->cta_button_text,
])
@endsection
