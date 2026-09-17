@extends('layouts.admin')

@section('content')
@php($editing = $industry->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit industry' : 'New industry' }}</h1>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.industries.update', $industry) : route('admin.industries.store') }}" class="card-soft p-4" style="max-width: 46rem;">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="row g-3">
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Name *</label>
            <input name="name" class="form-control" required value="{{ old('name', $industry->name) }}">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Slug (auto if empty)</label>
            <input name="slug" class="form-control" value="{{ old('slug', $industry->slug) }}" placeholder="education">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Icon</label>
            <select name="icon" class="form-select">
                @foreach(['graduation' => 'Graduation (education)', 'sprout' => 'Sprout (agriculture)', 'briefcase' => 'Briefcase (business)', 'banknote' => 'Banknote (fintech)', 'heart' => 'Heart (health)', 'globe' => 'Globe (NGO/public)', 'code' => 'Code', 'cloud' => 'Cloud', 'shield' => 'Shield', 'database' => 'Database'] as $val => $label)
                    <option value="{{ $val }}" @selected(old('icon', $industry->icon) === $val)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Tagline</label>
            <input name="tagline" class="form-control" value="{{ old('tagline', $industry->tagline) }}">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Summary (card text)</label>
            <textarea name="summary" rows="2" class="form-control">{{ old('summary', $industry->summary) }}</textarea>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Description (blank line between paragraphs)</label>
            <textarea name="description" rows="6" class="form-control">{{ old('description', $industry->description) }}</textarea>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Offerings (one per line)</label>
            <textarea name="offerings" rows="6" class="form-control">{{ old('offerings', $industry->offerings) }}</textarea>
        </div>
        <div class="col-sm-3">
            <label class="form-label small fw-bold">Sort order</label>
            <input name="sort_order" type="number" class="form-control" value="{{ old('sort_order', $industry->sort_order ?? 0) }}">
        </div>
        <div class="col-sm-9 d-flex align-items-end">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $industry->published ?? true))>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="{{ route('admin.industries.index') }}" class="btn-dark-pill">Cancel</a>
    </div>
</form>
@endsection
