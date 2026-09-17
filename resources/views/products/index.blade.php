@extends('layouts.app')

@section('title', 'Products — Vectarlabs')

@section('content')
@include('partials.dark-hero', [
    'badge' => 'Software In Stock',
    'title1' => 'PROVEN PLATFORMS,',
    'title2' => 'READY TO DEPLOY',
    'tagline' => 'SaaS subscriptions and standalone licenses built from real client engagements — hardened in production, available today.',
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">Our Products</p>
        <div class="row g-4 mt-2">
            @foreach($products as $p)
                <div class="col-md-6">
                    <div class="card-soft hoverable p-4">
                        <div class="d-flex justify-content-between align-items-start gap-3">
                            <h5 class="font-display fw-bold text-navy mb-0">{{ $p->name }}</h5>
                            <span class="type-badge {{ $p->type }} flex-shrink-0">{{ $p->isSaas() ? 'SaaS' : 'Standalone' }}</span>
                        </div>
                        <p class="text-brand fw-semibold small mt-1 mb-2">{{ $p->tagline }}</p>
                        <p class="small text-secondary mb-0">{{ $p->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-band', [
    'title1' => 'NEED SOMETHING',
    'title2' => 'CUSTOM-BUILT?',
    'subtitle' => 'Every product here started as a custom engagement. Tell us your workflow — we will scope the right fit.',
    'buttonText' => 'Discuss Your Requirements',
])
@endsection
