<section class="hero-dark">
    <div class="container">
        @if(!empty($badge))<span class="hero-badge">{{ $badge }}</span>@endif
        <h1 class="display-hero text-white mx-auto mt-4" style="max-width: 56rem; font-size: clamp(2.6rem, 6vw, 4.5rem);">
            {{ $title1 }}@if(!empty($title2))<br><span class="text-brand">{{ $title2 }}</span>@endif
        </h1>
        @if(!empty($tagline))
            <p class="mx-auto mt-4 text-white-50" style="max-width: 42rem;">{{ $tagline }}</p>
        @endif
    </div>
</section>
