@extends('layouts.app')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Contact']], 'dark' => true])

@include('partials.dark-hero', [
    'badge' => 'Contact Vectarlabs',
    'title1' => $S('contact.hero.title1', "Let's build something"),
    'title2' => $S('contact.hero.title2', 'exceptional together.'),
    'tagline' => $S('contact.hero.subtitle'),
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <div class="row g-5">
            <div class="col-lg-5">
                <p class="section-marker">Get in touch</p>
                <h2 class="display-hero text-navy mt-3" style="font-size: clamp(1.7rem, 3vw, 2.2rem); text-transform: none;">{{ $S('contact.form.title', 'Talk directly with our engineering team.') }}</h2>
                <p class="font-serif-body text-secondary mt-3">{{ $S('contact.form.subtitle', 'No sales middlemen — your inquiry goes straight to the people who will scope and build your platform.') }}</p>
                <ul class="list-unstyled d-grid gap-4 mt-4">
                    @foreach([
                        ['envelope', 'Email', $S('contact.email')],
                        ['telephone', 'Phone', $S('contact.phone')],
                        ['geo-alt', 'Office', $S('contact.location')],
                    ] as [$icon, $label, $value])
                        <li class="d-flex align-items-center gap-3">
                            <span class="icon-chip"><i class="bi bi-{{ $icon }}"></i></span>
                            <div>
                                <p class="text-secondary fw-bold mb-0" style="font-size: .68rem; letter-spacing: .15em; text-transform: uppercase;">{{ $label }}</p>
                                <p class="fw-semibold text-navy mb-0">{{ $value }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-7">
                <div class="card-soft p-4 p-md-5">
                    @if(session('success'))
                        <div class="text-center py-5">
                            <i class="bi bi-check-circle text-brand" style="font-size: 3.5rem;"></i>
                            <h4 class="font-display fw-bold text-navy mt-3">Message received.</h4>
                            <p class="text-secondary small mx-auto" style="max-width: 22rem;">{{ session('success') }}</p>
                        </div>
                    @else
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold">Full name *</label>
                                    <input name="name" class="form-control" required value="{{ old('name') }}" placeholder="Jane Doe">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold">Email *</label>
                                    <input name="email" type="email" class="form-control" required value="{{ old('email') }}" placeholder="jane@company.com">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold">Company / Institution</label>
                                    <input name="company" class="form-control" value="{{ old('company') }}" placeholder="Acme Schools Ltd.">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold">Subject</label>
                                    <input name="subject" class="form-control" value="{{ old('subject') }}" placeholder="New web platform">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Project details *</label>
                                    <textarea name="message" rows="6" class="form-control" required placeholder="Tell us about your goals, timeline, and any existing systems…">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger small mt-3 mb-0">
                                    @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                                </div>
                            @endif
                            <button type="submit" class="btn-brand mt-4">Send message <i class="bi bi-send"></i></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
