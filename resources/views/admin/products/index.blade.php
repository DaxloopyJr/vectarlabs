@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Products</h1>
        <p class="small text-secondary mb-0">Software products shown on the public Products page.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add product</a>
</div>

<div class="row g-3">
    @foreach($products as $p)
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-1">{{ $p->name }}</p>
                        <span class="type-badge {{ $p->type }}">{{ $p->isSaas() ? 'SaaS' : 'Standalone' }}</span>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.products.destroy', $p) }}" onsubmit="return confirm('Remove {{ $p->name }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                @if($p->tagline)<p class="small text-secondary mt-2 mb-0">{{ $p->tagline }}</p>@endif
                <p class="small text-secondary mt-2 mb-0">{{ $p->published ? 'Published' : 'Hidden' }} · order {{ $p->sort_order }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
