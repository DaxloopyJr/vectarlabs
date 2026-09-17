@extends('layouts.admin')

@section('content')
@php($editing = $service->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit: '.$service->title_line1.' '.$service->title_line2 : 'New service' }}</h1>
    <p class="small text-secondary mb-0">All fields map directly to the service detail page sections.</p>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.services.update', $service) : route('admin.services.store') }}" style="max-width: 56rem;">
    @csrf
    @if($editing) @method('PUT') @endif

    <div class="card-soft p-4 mb-4">
        <h6 class="font-display fw-bold text-navy">Hero section</h6>
        <div class="row g-3 mt-1">
            <div class="col-md-4">
                <label class="form-label small fw-bold">Slug (URL) *</label>
                <input name="slug" class="form-control" required value="{{ old('slug', $service->slug) }}" placeholder="custom-software-development">
            </div>
            <div class="col-md-5">
                <label class="form-label small fw-bold">Badge</label>
                <input name="badge" class="form-control" value="{{ old('badge', $service->badge) }}" placeholder="Core Engineering Service">
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-bold">Sort order</label>
                <input name="sort_order" type="number" class="form-control" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">Title line 1 (white) *</label>
                <input name="title_line1" class="form-control" required value="{{ old('title_line1', $service->title_line1) }}" placeholder="CUSTOM SOFTWARE">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">Title line 2 (orange)</label>
                <input name="title_line2" class="form-control" value="{{ old('title_line2', $service->title_line2) }}" placeholder="DEVELOPMENT">
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">Tagline</label>
                <textarea name="tagline" rows="2" class="form-control">{{ old('tagline', $service->tagline) }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">Summary (listing cards)</label>
                <textarea name="summary" rows="2" class="form-control">{{ old('summary', $service->summary) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card-soft p-4 mb-4">
        <h6 class="font-display fw-bold text-navy">Capabilities &amp; stack</h6>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label small fw-bold">List title</label>
                <input name="list_title" class="form-control" value="{{ old('list_title', $service->list_title) }}" placeholder="Capabilities">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">Hero button text</label>
                <input name="hero_button_text" class="form-control" value="{{ old('hero_button_text', $service->hero_button_text) }}" placeholder="Start a Project">
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">List items (one per line)</label>
                <textarea name="list_items" rows="5" class="form-control">{{ old('list_items', $service->list_items) }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-bold">Stack label</label>
                <input name="stack_label" class="form-control" value="{{ old('stack_label', $service->stack_label) }}" placeholder="Primary Stack">
            </div>
            <div class="col-md-8">
                <label class="form-label small fw-bold">Stack text</label>
                <textarea name="stack_text" rows="2" class="form-control">{{ old('stack_text', $service->stack_text) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card-soft p-4 mb-4">
        <h6 class="font-display fw-bold text-navy">Overview section</h6>
        <div class="row g-3 mt-1">
            <div class="col-12">
                <label class="form-label small fw-bold">Overview title</label>
                <textarea name="overview_title" rows="2" class="form-control">{{ old('overview_title', $service->overview_title) }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">Paragraph 1</label>
                <textarea name="overview_body1" rows="3" class="form-control">{{ old('overview_body1', $service->overview_body1) }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">Paragraph 2</label>
                <textarea name="overview_body2" rows="3" class="form-control">{{ old('overview_body2', $service->overview_body2) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card-soft p-4 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="font-display fw-bold text-navy mb-0">Feature cards</h6>
            <button type="button" class="btn btn-sm btn-outline-warning rounded-pill" onclick="addCard()"><i class="bi bi-plus-lg"></i> Add card</button>
        </div>
        <div class="mt-3">
            <label class="form-label small fw-bold">Cards section title</label>
            <input name="cards_section_title" class="form-control" value="{{ old('cards_section_title', $service->cards_section_title) }}" placeholder="Our Engineering Process">
        </div>
        <div id="cards" class="d-grid gap-3 mt-3">
            @php($oldCards = old('card_title') ? collect(old('card_title'))->map(fn ($t, $i) => ['title' => $t, 'body' => old('card_body')[$i] ?? '', 'icon' => old('card_icon')[$i] ?? 'code']) : ($editing ? $service->cards->map(fn ($c) => ['title' => $c->title, 'body' => $c->body, 'icon' => $c->icon]) : collect([])))
            @foreach($oldCards as $card)
                <div class="border rounded-3 p-3 bg-light card-row">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select name="card_icon[]" class="form-select form-select-sm">
                                @foreach(['code', 'compass', 'layout', 'rocket', 'smartphone', 'globe', 'dashboard', 'users', 'layers', 'target', 'cloud', 'shield', 'database'] as $ic)
                                    <option value="{{ $ic }}" @selected(($card['icon'] ?? 'code') === $ic)>{{ $ic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8">
                            <input name="card_title[]" class="form-control form-control-sm" placeholder="Card title" value="{{ $card['title'] ?? '' }}">
                        </div>
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.card-row').remove()"><i class="bi bi-trash"></i></button>
                        </div>
                        <div class="col-12">
                            <textarea name="card_body[]" rows="2" class="form-control form-control-sm" placeholder="Card body">{{ $card['body'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="card-soft p-4 mb-4">
        <h6 class="font-display fw-bold text-navy">Call-to-action band</h6>
        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label small fw-bold">CTA title (white)</label>
                <input name="cta_title1" class="form-control" value="{{ old('cta_title1', $service->cta_title1) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">CTA title (orange)</label>
                <input name="cta_title2" class="form-control" value="{{ old('cta_title2', $service->cta_title2) }}">
            </div>
            <div class="col-12">
                <label class="form-label small fw-bold">CTA subtitle</label>
                <textarea name="cta_subtitle" rows="2" class="form-control">{{ old('cta_subtitle', $service->cta_subtitle) }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">CTA button text</label>
                <input name="cta_button_text" class="form-control" value="{{ old('cta_button_text', $service->cta_button_text) }}">
            </div>
        </div>
    </div>

    <div class="form-check form-switch mb-4">
        <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $service->published ?? true))>
        <label class="form-check-label fw-semibold small" for="published">Published (visible on website)</label>
    </div>

    <div class="d-flex gap-2 pb-5">
        <button type="submit" class="btn-brand"><i class="bi bi-save"></i> Save service</button>
        <a href="{{ route('admin.services.index') }}" class="btn-dark-pill px-4 py-3">Cancel</a>
    </div>
</form>

<template id="cardTemplate">
    <div class="border rounded-3 p-3 bg-light card-row">
        <div class="row g-2">
            <div class="col-md-3">
                <select name="card_icon[]" class="form-select form-select-sm">
                    @foreach(['code', 'compass', 'layout', 'rocket', 'smartphone', 'globe', 'dashboard', 'users', 'layers', 'target', 'cloud', 'shield', 'database'] as $ic)
                        <option value="{{ $ic }}">{{ $ic }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <input name="card_title[]" class="form-control form-control-sm" placeholder="Card title">
            </div>
            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.card-row').remove()"><i class="bi bi-trash"></i></button>
            </div>
            <div class="col-12">
                <textarea name="card_body[]" rows="2" class="form-control form-control-sm" placeholder="Card body"></textarea>
            </div>
        </div>
    </div>
</template>
<script>
function addCard() {
    document.getElementById('cards').appendChild(document.getElementById('cardTemplate').content.cloneNode(true));
}
</script>
@endsection
