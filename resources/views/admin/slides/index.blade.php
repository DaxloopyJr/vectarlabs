@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Hero Slides</h1>
        <p class="small text-secondary mb-0">Slides shown in the home page hero. Drag order via the sort field.</p>
    </div>
    <a href="{{ route('admin.slides.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add slide</a>
</div>

<div class="row g-3">
    @foreach($slides as $slide)
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-0">{{ $slide->title1 }} {{ $slide->title2 }}</p>
                        <p class="text-brand fw-bold text-uppercase mb-0" style="font-size: .68rem; letter-spacing: .1em;">{{ $slide->eyebrow }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.slides.edit', $slide) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}" onsubmit="return confirm('Remove this slide?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                @if($slide->subtitle)<p class="small text-secondary mt-2 mb-0">{{ Str::limit($slide->subtitle, 120) }}</p>@endif
                <p class="small text-secondary mt-2 mb-0">{{ $slide->published ? 'Published' : 'Hidden' }} · order {{ $slide->sort_order }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
