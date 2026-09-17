@extends('layouts.admin')

@section('content')
@php($editing = $work->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit project' : 'New project' }}</h1>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.works.update', $work) : route('admin.works.store') }}" class="card-soft p-4" style="max-width: 46rem;">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="row g-3">
        <div class="col-sm-8">
            <label class="form-label small fw-bold">Title *</label>
            <input name="title" class="form-control" required value="{{ old('title', $work->title) }}">
        </div>
        <div class="col-sm-4">
            <label class="form-label small fw-bold">Slug (auto if empty)</label>
            <input name="slug" class="form-control" value="{{ old('slug', $work->slug) }}">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Client</label>
            <input name="client" class="form-control" value="{{ old('client', $work->client) }}">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Category</label>
            <input name="category" class="form-control" value="{{ old('category', $work->category) }}" placeholder="Web Platform">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Industry</label>
            <input name="industry" class="form-control" value="{{ old('industry', $work->industry) }}" placeholder="Education">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Year</label>
            <input name="year" class="form-control" value="{{ old('year', $work->year) }}" placeholder="2025">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Summary (card text)</label>
            <textarea name="summary" rows="2" class="form-control">{{ old('summary', $work->summary) }}</textarea>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Case study (blank line between paragraphs)</label>
            <textarea name="description" rows="6" class="form-control">{{ old('description', $work->description) }}</textarea>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Tags (comma separated)</label>
            <input name="tags" class="form-control" value="{{ old('tags', $work->tags) }}" placeholder="M-Pesa, Multi-tenant, React">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Image URL (optional)</label>
            <input name="image_url" class="form-control" value="{{ old('image_url', $work->image_url) }}" placeholder="https://…">
        </div>
        <div class="col-sm-3">
            <label class="form-label small fw-bold">Sort order</label>
            <input name="sort_order" type="number" class="form-control" value="{{ old('sort_order', $work->sort_order ?? 0) }}">
        </div>
        <div class="col-sm-9 d-flex align-items-end gap-4">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured" @checked(old('featured', $work->featured ?? false))>
                <label class="form-check-label small fw-semibold" for="featured">Featured</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $work->published ?? true))>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="{{ route('admin.works.index') }}" class="btn-dark-pill">Cancel</a>
    </div>
</form>
@endsection
