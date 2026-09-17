@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Insights</h1>
        <p class="small text-secondary mb-0">Articles shown on the Home and About pages.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="btn-brand" style="padding: .6rem 1.3rem;"><i class="bi bi-plus-lg"></i> New article</a>
</div>

<div class="card-soft overflow-hidden">
    <table class="table table-hover align-middle mb-0">
        <thead class="small text-secondary text-uppercase">
            <tr><th class="px-4">Title</th><th>Tag</th><th>Status</th><th class="text-end px-4">Actions</th></tr>
        </thead>
        <tbody>
            @foreach($posts as $p)
                <tr>
                    <td class="px-4">
                        <p class="fw-semibold text-navy small mb-0">{{ $p->title }}</p>
                        <p class="small text-secondary mb-0 text-truncate" style="max-width: 26rem;">{{ $p->excerpt }}</p>
                    </td>
                    <td><span class="badge rounded-pill text-bg-warning">{{ $p->tag ?: '—' }}</span></td>
                    <td><span class="badge rounded-pill {{ $p->published ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $p->published ? 'Published' : 'Draft' }}</span></td>
                    <td class="text-end px-4">
                        <a href="{{ route('admin.posts.edit', $p) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $p) }}" class="d-inline" onsubmit="return confirm('Delete this article?')">
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
