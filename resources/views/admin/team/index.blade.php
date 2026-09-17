@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Team</h1>
        <p class="small text-secondary mb-0">People shown on the public Team page.</p>
    </div>
    <a href="{{ route('admin.team.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> Add member</a>
</div>

<div class="row g-3">
    @foreach($members as $m)
        <div class="col-md-6 col-xl-4">
            <div class="card-soft p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="font-display fw-bold text-navy mb-0">{{ $m->name }}</p>
                        <p class="text-brand fw-bold text-uppercase mb-0" style="font-size: .68rem; letter-spacing: .1em;">{{ $m->role }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.team.edit', $m) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.team.destroy', $m) }}" onsubmit="return confirm('Remove {{ $m->name }}?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                @if($m->bio)<p class="small text-secondary mt-2 mb-0">{{ Str::limit($m->bio, 120) }}</p>@endif
                <p class="small text-secondary mt-2 mb-0">{{ $m->published ? 'Published' : 'Hidden' }} · order {{ $m->sort_order }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
