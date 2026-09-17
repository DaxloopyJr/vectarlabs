@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Messages</h1>
    <p class="small text-secondary mb-0">Inquiries submitted through the Contact page form.</p>
</div>

<div class="d-grid gap-3">
    @forelse($messages as $m)
        <div class="card-soft p-4 {{ $m->read ? '' : 'border-warning' }}">
            <div class="d-flex flex-wrap justify-content-between gap-2">
                <div>
                    <p class="font-display fw-bold text-navy mb-0">
                        {{ $m->name }}
                        @unless($m->read)<span class="badge rounded-pill text-bg-warning ms-1">New</span>@endunless
                    </p>
                    <p class="small text-secondary mb-0">{{ $m->email }}{{ $m->company ? ' · '.$m->company : '' }}{{ $m->subject ? ' · '.$m->subject : '' }}</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="small text-secondary">{{ $m->created_at->format('M j, Y H:i') }}</span>
                    @unless($m->read)
                        <form method="POST" action="{{ route('admin.messages.read', $m) }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-secondary" title="Mark as read"><i class="bi bi-envelope-open"></i></button>
                        </form>
                    @endunless
                    <form method="POST" action="{{ route('admin.messages.destroy', $m) }}" onsubmit="return confirm('Delete this message?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
            <p class="small text-navy mt-3 mb-0" style="white-space: pre-wrap;">{{ $m->message }}</p>
        </div>
    @empty
        <div class="card-soft p-5 text-center small text-secondary">No messages yet.</div>
    @endforelse
</div>

<div class="mt-4">{{ $messages->links() }}</div>
@endsection
