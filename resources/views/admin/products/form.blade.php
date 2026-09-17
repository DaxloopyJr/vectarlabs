@extends('layouts.admin')

@section('content')
@php($editing = $product->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit product' : 'New product' }}</h1>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.products.update', $product) : route('admin.products.store') }}" class="card-soft p-4" style="max-width: 40rem;">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="row g-3">
        <div class="col-sm-8">
            <label class="form-label small fw-bold">Name *</label>
            <input name="name" class="form-control" required value="{{ old('name', $product->name) }}">
        </div>
        <div class="col-sm-4">
            <label class="form-label small fw-bold">Type *</label>
            <select name="type" class="form-select">
                <option value="saas" @selected(old('type', $product->type) === 'saas')>SaaS</option>
                <option value="standalone" @selected(old('type', $product->type) === 'standalone')>Standalone</option>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Tagline</label>
            <input name="tagline" class="form-control" value="{{ old('tagline', $product->tagline) }}">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Description</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="col-sm-3">
            <label class="form-label small fw-bold">Sort order</label>
            <input name="sort_order" type="number" class="form-control" value="{{ old('sort_order', $product->sort_order ?? 0) }}">
        </div>
        <div class="col-sm-9 d-flex align-items-end">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $product->published ?? true))>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="{{ route('admin.products.index') }}" class="btn-dark-pill">Cancel</a>
    </div>
</form>
@endsection
