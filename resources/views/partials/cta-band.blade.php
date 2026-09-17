<section class="bg-navy-deep text-center py-5">
    <div class="container py-5">
        <h2 class="display-hero text-white mx-auto" style="max-width: 46rem; font-size: clamp(2rem, 4.5vw, 3rem);">
            {{ $title1 }} @if(!empty($title2))<span class="text-brand">{{ $title2 }}</span>@endif
        </h2>
        @if(!empty($subtitle))<p class="mx-auto mt-3 text-white-50" style="max-width: 36rem;">{{ $subtitle }}</p>@endif
        @if(!empty($buttonText))
            <a href="{{ route('contact') }}" class="btn-brand mt-4">{{ $buttonText }} <i class="bi bi-arrow-right"></i></a>
        @endif
    </div>
</section>
