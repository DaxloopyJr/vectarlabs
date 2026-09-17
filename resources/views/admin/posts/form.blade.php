@extends('layouts.admin')

@section('content')
@php($editing = $post->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit article' : 'New article' }}</h1>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.posts.update', $post) : route('admin.posts.store') }}" class="card-soft p-4" style="max-width: 44rem;">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="row g-3">
        <div class="col-12">
            <label class="form-label small fw-bold">Title *</label>
            <input name="title" class="form-control" required value="{{ old('title', $post->title) }}">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Excerpt</label>
            <textarea name="excerpt" rows="2" class="form-control">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Body</label>
            <textarea name="body" rows="6" class="form-control">{{ old('body', $post->body) }}</textarea>
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Tag</label>
            <input name="tag" class="form-control" value="{{ old('tag', $post->tag) }}" placeholder="Engineering">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Cover style</label>
            <select name="cover_style" class="form-select">
                @foreach(['gradient-a' => 'Navy / orange', 'gradient-b' => 'Navy / blue', 'gradient-c' => 'Navy / violet'] as $v => $label)
                    <option value="{{ $v }}" @selected(old('cover_style', $post->cover_style) === $v)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $post->published ?? true))>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="{{ route('admin.posts.index') }}" class="btn-dark-pill">Cancel</a>
    </div>
</form>
@endsection
