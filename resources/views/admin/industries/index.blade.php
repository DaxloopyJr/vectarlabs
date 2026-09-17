@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Industries</h1>
        <p class="small text-secondary mb-0">Sectors shown on the public Industries pages.</p>
    </div>
    <a href="{{ route('admin.industries.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add industry</a>
</div>

<div class="row g-3">
    @foreach($industries as $ind)
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center gap-2">
                        <span class="icon-chip" style="width: 2.2rem; height: 2.2rem; font-size: 1rem;"><i class="bi {{ $ind->iconClass() }}"></i></span>
                        <p class="font-display fw-bold text-navy mb-0">{{ $ind->name }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.industries.edit', $ind) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.industries.destroy', $ind) }}" onsubmit="return confirm('Remove {{ $ind->name }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                @if($ind->tagline)<p class="small text-secondary mt-2 mb-0">{{ $ind->tagline }}</p>@endif
                <p class="small text-secondary mt-2 mb-0">{{ $ind->published ? 'Published' : 'Hidden' }} · order {{ $ind->sort_order }} · /industries/{{ $ind->slug }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
