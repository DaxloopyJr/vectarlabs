@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Our Work</h1>
        <p class="small text-secondary mb-0">Case studies shown on the public Work pages.</p>
    </div>
    <a href="{{ route('admin.works.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add project</a>
</div>

<div class="row g-3">
    @foreach($works as $w)
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-1">{{ $w->title }} @if($w->featured)<i class="bi bi-star-fill text-brand small"></i>@endif</p>
                        <p class="small text-secondary mb-0">{{ $w->category }} · {{ $w->industry }} · {{ $w->year }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.works.edit', $w) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.works.destroy', $w) }}" onsubmit="return confirm('Remove {{ $w->title }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                @if($w->summary)<p class="small text-secondary mt-2 mb-0">{{ Str::limit($w->summary, 120) }}</p>@endif
                <p class="small text-secondary mt-2 mb-0">{{ $w->published ? 'Published' : 'Hidden' }} · order {{ $w->sort_order }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
