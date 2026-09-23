@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Testimonials</h1>
        <p class="small text-secondary mb-0">Client testimonials shown in the home page slider.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add testimonial</a>
</div>

<div class="row g-3">
    @foreach($testimonials as $t)
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-0">{{ $t->author }}</p>
                        <p class="text-brand fw-bold text-uppercase mb-0" style="font-size: .68rem; letter-spacing: .1em;">{{ $t->role }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $t) }}" onsubmit="return confirm('Remove {{ $t->author }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <p class="small text-secondary mt-2 mb-0">{{ Str::limit($t->quote, 140) }}</p>
                <p class="small text-secondary mt-2 mb-0">{{ $t->published ? 'Published' : 'Hidden' }} · order {{ $t->sort_order }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
