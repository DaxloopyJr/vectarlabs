@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Services</h1>
        <p class="small text-secondary mb-0">Each published service gets its own dynamic detail page.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> New service</a>
</div>

<div class="card-soft overflow-hidden">
    <table class="table table-hover align-middle mb-0">
        <thead class="small text-secondary text-uppercase">
            <tr><th class="px-4">Service</th><th class="d-none d-md-table-cell">Slug</th><th>Cards</th><th>Status</th><th class="text-end px-4">Actions</th></tr>
        </thead>
        <tbody>
            @foreach($services as $s)
                <tr>
                    <td class="px-4">
                        <p class="fw-semibold text-navy small mb-0">{{ $s->title_line1 }} {{ $s->title_line2 }}</p>
                        <p class="small text-secondary mb-0 text-truncate" style="max-width: 22rem;">{{ $s->summary }}</p>
                    </td>
                    <td class="d-none d-md-table-cell"><code class="small">/services/{{ $s->slug }}</code></td>
                    <td class="small">{{ $s->cards_count }}</td>
                    <td><span class="badge rounded-pill {{ $s->published ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $s->published ? 'Published' : 'Draft' }}</span></td>
                    <td class="text-end px-4">
                        <a href="{{ route('admin.services.edit', $s) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.services.destroy', $s) }}" class="d-inline" onsubmit="return confirm('Delete this service?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
