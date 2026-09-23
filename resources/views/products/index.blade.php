@extends('layouts.app')

@section('title', 'Products — Vectarlabs')

@section('content')
@php($S = fn (string $k, string $d = '') => \App\Models\Setting::get($k, $d))

@include('partials.breadcrumbs', ['crumbs' => [['label' => 'Products']], 'dark' => true])

@include('partials.dark-hero', [
    'badge' => $S('products.hero.badge', 'Our Products'),
    'title1' => $S('products.hero.title1', 'Software products,'),
    'title2' => $S('products.hero.title2', 'ready to deploy.'),
    'tagline' => $S('products.hero.tagline', 'Battle-tested platforms built by Vectarlabs — available as managed SaaS subscriptions or standalone licenses you run on your own infrastructure.'),
])

<section class="py-5">
    <div class="container" style="max-width: 72rem;">
        <p class="section-marker">{{ $S('products.marker', 'Our Products') }}</p>
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="card-soft p-4">
                    <span class="type-badge saas">SaaS subscription</span>
                    <h5 class="font-display fw-bold text-navy mt-3">Managed in our cloud</h5>
                    <p class="small text-secondary mb-0">Hosted, secured, backed up and continuously updated by our team. You get a login and start working — no servers to buy, no upgrades to schedule. Monthly or annual billing per organisation.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-soft p-4">
                    <span class="type-badge standalone">Standalone license</span>
                    <h5 class="font-display fw-bold text-navy mt-3">Run on your infrastructure</h5>
                    <p class="small text-secondary mb-0">A perpetual license deployed on your own servers, with source escrow and a support contract. Ideal for institutions with strict data-residency or offline requirements.</p>
                </div>
            </div>
        </div>
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
    'subtitle' => 'If none of our off-the-shelf products fits exactly, we design and build bespoke software around your process.',
    'buttonText' => 'Talk to Us',
])
@endsection
