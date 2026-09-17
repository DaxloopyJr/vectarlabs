@extends('layouts.admin')

@section('content')
@php($editing = $member->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit member' : 'New member' }}</h1>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.team.update', $member) : route('admin.team.store') }}" class="card-soft p-4" style="max-width: 40rem;">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="row g-3">
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Name *</label>
            <input name="name" class="form-control" required value="{{ old('name', $member->name) }}">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Role *</label>
            <input name="role" class="form-control" required value="{{ old('role', $member->role) }}">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Bio</label>
            <textarea name="bio" rows="3" class="form-control">{{ old('bio', $member->bio) }}</textarea>
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Photo URL (optional)</label>
            <input name="photo_url" class="form-control" value="{{ old('photo_url', $member->photo_url) }}" placeholder="https://…">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">LinkedIn URL</label>
            <input name="linkedin" class="form-control" value="{{ old('linkedin', $member->linkedin) }}" placeholder="https://linkedin.com/in/…">
        </div>
        <div class="col-sm-3">
            <label class="form-label small fw-bold">Sort order</label>
            <input name="sort_order" type="number" class="form-control" value="{{ old('sort_order', $member->sort_order ?? 0) }}">
        </div>
        <div class="col-sm-9 d-flex align-items-end">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $member->published ?? true))>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="{{ route('admin.team.index') }}" class="btn-dark-pill">Cancel</a>
    </div>
</form>
@endsection
