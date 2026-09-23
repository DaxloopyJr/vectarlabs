@extends('layouts.app')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

{{-- Hero slider --}}
<section class="hero-slider">
    <div class="container">
        <div class="hero-slides-wrap d-flex align-items-center justify-content-center">
            @foreach($slides as $i => $slide)
                <div class="hero-slide mx-auto {{ $i ? 'hidden-slide' : '' }}" style="max-width: 52rem;" data-slide>
                    <span class="hero-badge">{{ $slide->eyebrow }}</span>
                    <h1 class="display-hero text-white mx-auto mt-4" style="font-size: clamp(2rem, 5.5vw, 3.6rem); text-transform: none;">
                        {{ $slide->title1 }}<br>
                        {{ $slide->title2 }} @if($slide->title3)<span class="text-brand">{{ $slide->title3 }}</span>@endif
                    </h1>
                    @if($slide->subtitle)
                        <p class="font-serif-body mx-auto mt-4" style="max-width: 38rem; color: rgba(255,255,255,.65);">{{ $slide->subtitle }}</p>
                    @endif
                    @if($slide->button_text)
                        <a href="{{ $slide->button_url ?: route('contact') }}" class="btn-brand mt-4">{{ $slide->button_text }} <i class="bi bi-arrow-right"></i></a>
                    @endif
                    @if($slide->chipList())
                        <div class="d-flex flex-wrap justify-content-center gap-2 mt-5">
                            @foreach($slide->chipList() as $chip)
                                <span class="hero-chip">{{ $chip }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        @if($slides->count() > 1)
            <div class="d-flex align-items-center justify-content-center gap-3 mt-5">
                <button class="slider-arrow" id="heroPrev" aria-label="Previous slide"><i class="bi bi-arrow-left"></i></button>
                <div class="d-flex gap-2">
                    @foreach($slides as $i => $slide)
                        <button class="slider-dot {{ $i ? '' : 'active' }}" data-dot="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                    @endforeach
                </div>
                <button class="slider-arrow" id="heroNext" aria-label="Next slide"><i class="bi bi-arrow-right"></i></button>
            </div>
        @endif
    </div>
</section>

{{-- Services --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('home.services.marker', 'What we do') }}</p>
        <div class="row align-items-end g-4 mt-1">
            <div class="col-md-7">
                <h2 class="display-hero text-navy" style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); text-transform: none;">{{ $S('home.services.title') }}</h2>
            </div>
            <div class="col-md-5 text-md-end">
                <p class="font-serif-body text-secondary mb-0">{{ $S('home.services.subtitle', 'We partner with ambitious institutions to design, build, and maintain the digital systems their missions depend on.') }}</p>
            </div>
        </div>
        <div class="row g-4 mt-2">
            @foreach($services as $s)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('services.show', $s->slug) }}" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="font-display fw-bold text-navy text-capitalize">{{ strtolower($s->title_line1.' '.$s->title_line2) }}</h5>
                                <i class="bi bi-arrow-up-right text-brand"></i>
                            </div>
                            <p class="small text-secondary mt-2 mb-0">{{ $s->summary }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('services') }}" class="text-decoration-none">
                    <div class="card-soft hoverable p-4 d-flex align-items-center justify-content-center text-center" style="border-style: dashed; background: #fff8f2;">
                        <span class="font-display fw-bold text-brand">{{ $S('home.services.more', 'Explore all services') }} <i class="bi bi-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Industries --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker centered">{{ $S('home.sectors.marker', 'Industries') }}</p>
        <h2 class="display-hero text-navy text-center mx-auto mt-3" style="max-width: 42rem; font-size: clamp(1.8rem, 3.5vw, 2.5rem); text-transform: none;">{{ $S('home.sectors.title') }}</h2>
        <div class="row g-4 mt-3">
            @foreach($industries as $ind)
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('industries.show', $ind->slug) }}" class="text-decoration-none">
                        <div class="card-soft hoverable p-4">
                            <span class="icon-chip mb-3"><i class="bi {{ $ind->iconClass() }}"></i></span>
                            <h6 class="font-display fw-bold text-navy">{{ $ind->name }}</h6>
                            <p class="small text-secondary mb-0">{{ $ind->summary }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <p class="text-center mt-4"><a href="{{ route('industries') }}" class="fw-bold text-brand text-decoration-none">{{ $S('home.sectors.more', 'Explore all industries') }} <i class="bi bi-arrow-right"></i></a></p>
    </div>
</section>

{{-- Testimonials slider + stats --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('home.testimonials.marker', 'Trusted by technology & operational leaders') }}</p>

        @if($testimonials->count())
            <div class="position-relative mt-3">
                <div class="t-viewport overflow-hidden">
                    <div class="t-track d-flex" id="testimonialTrack">
                        @foreach($testimonials as $ti => $t)
                            <article class="t-slide flex-shrink-0 px-2">
                                <div class="card-soft p-4 h-100">
                                    <i class="bi bi-quote fs-2 text-brand"></i>
                                    <blockquote class="font-serif-body text-navy mt-2 mb-0" style="font-size: 1.05rem; line-height: 1.65;">
                                        “{{ $t->quote }}”
                                    </blockquote>
                                    <div class="d-flex align-items-center gap-3 mt-4">
                                        @if($t->photo_url)
                                            <img src="{{ $t->photo_url }}" alt="{{ $t->author }}, {{ $t->role }}" class="rounded-2" style="width: 52px; height: 52px; object-fit: cover;" loading="lazy" decoding="async" width="52" height="52">
                                        @else
                                            <span class="avatar-initials {{ $ti % 2 ? 'alt' : '' }}" style="width: 52px; height: 52px; font-size: 1rem; border-radius: .5rem;">{{ $t->initials() }}</span>
                                        @endif
                                        <div>
                                            <p class="font-display fw-bold text-navy mb-0">{{ $t->author }}</p>
                                            <p class="small text-secondary mb-0">{{ $t->role }}</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <button class="slider-arrow slider-arrow-light" id="tPrev" aria-label="Previous testimonials"><i class="bi bi-arrow-left"></i></button>
                    <div class="d-flex gap-2" id="tDots"></div>
                    <button class="slider-arrow slider-arrow-light" id="tNext" aria-label="Next testimonials"><i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        @endif

        <div class="card-soft row g-4 text-center px-4 py-5 mt-5 mx-0">
            @foreach([1, 2, 3] as $i)
                <div class="col-sm-4">
                    <div class="stat-value">{{ $S("home.stats.$i.value") }}</div>
                    <div class="stat-label">{{ $S("home.stats.$i.label") }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Approach --}}
<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('home.approach.marker', 'Our approach') }}</p>
        <div class="row g-5 mt-1">
            <div class="col-lg-6"><div class="abstract-panel panel-a" style="height: 20rem;"></div></div>
            <div class="col-lg-6">
                <ol class="list-unstyled d-grid gap-4">
                    @foreach([1, 2, 3, 4] as $i)
                        <li class="d-flex gap-3">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-circle border border-warning font-display fw-bold text-brand flex-shrink-0" style="width: 2.2rem; height: 2.2rem;">{{ $i }}</span>
                            <div>
                                <h6 class="font-display fw-bold text-navy mb-1">{{ $S("home.approach.step$i.title") }}</h6>
                                <p class="small text-secondary mb-0">{{ $S("home.approach.step$i.body") }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
                <a href="{{ route('contact') }}" class="btn-dark-pill mt-4 ms-5">{{ $S('home.approach.button', 'Start your project') }}</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
(function () {
    // ---------- Hero slider ----------
    const slides = document.querySelectorAll('[data-slide]');
    if (slides.length > 1) {
        const dots = document.querySelectorAll('[data-dot]');
        let current = 0, timer = null;

        function go(n) {
            current = (n + slides.length) % slides.length;
            slides.forEach((s, i) => s.classList.toggle('hidden-slide', i !== current));
            dots.forEach((d, i) => d.classList.toggle('active', i === current));
        }
        function restart() { clearInterval(timer); timer = setInterval(() => go(current + 1), 6000); }

        document.getElementById('heroPrev').addEventListener('click', () => { go(current - 1); restart(); });
        document.getElementById('heroNext').addEventListener('click', () => { go(current + 1); restart(); });
        dots.forEach(d => d.addEventListener('click', () => { go(parseInt(d.dataset.dot, 10)); restart(); }));
        restart();
    }

    // ---------- Testimonials slider (multi-card) ----------
    const track = document.getElementById('testimonialTrack');
    if (track) {
        const items = track.children.length;
        const dotsWrap = document.getElementById('tDots');
        let pos = 0;

        const perView = () => window.innerWidth >= 992 ? 2 : 1;
        const maxPos  = () => Math.max(0, items - perView());

        function render() {
            pos = Math.min(pos, maxPos());
            const w = track.children[0].getBoundingClientRect().width;
            track.style.transform = 'translateX(' + (-pos * w) + 'px)';
            dotsWrap.innerHTML = '';
            for (let i = 0; i <= maxPos(); i++) {
                const b = document.createElement('button');
                b.className = 'slider-dot slider-dot-light' + (i === pos ? ' active' : '');
                b.setAttribute('aria-label', 'Go to testimonials page ' + (i + 1));
                b.addEventListener('click', () => { pos = i; render(); });
                dotsWrap.appendChild(b);
            }
        }
        document.getElementById('tPrev').addEventListener('click', () => { pos = pos > 0 ? pos - 1 : maxPos(); render(); });
        document.getElementById('tNext').addEventListener('click', () => { pos = pos < maxPos() ? pos + 1 : 0; render(); });
        window.addEventListener('resize', render);
        render();
        setInterval(() => { pos = pos < maxPos() ? pos + 1 : 0; render(); }, 7000);
    }
})();
</script>
@endpush
