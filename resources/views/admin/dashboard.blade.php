@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Dashboard</h1>
        <p class="small text-secondary mb-0">Overview of your website content and inquiries.</p>
    </div>
</div>

<div class="row g-3">
    @foreach([
        ['Services', $services, 'tools', route('admin.services.index')],
        ['Team members', $team, 'people', route('admin.team.index')],
        ['Insight articles', $posts, 'file-text', route('admin.posts.index')],
        ['Unread messages', $unread, 'inbox', route('admin.messages.index')],
    ] as [$label, $value, $icon, $link])
        <div class="col-sm-6 col-xl-3">
            <a href="{{ $link }}" class="text-decoration-none">
                <div class="card-soft hoverable p-4">
                    <div class="d-flex justify-content-between">
                        <span class="text-secondary fw-bold" style="font-size: .68rem; letter-spacing: .14em; text-transform: uppercase;">{{ $label }}</span>
                        <i class="bi bi-{{ $icon }} text-brand"></i>
                    </div>
                    <p class="display-hero text-navy mt-2 mb-0" style="font-size: 2.4rem;">{{ $value }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="card-soft p-4 mt-4">
    <h5 class="font-display fw-bold text-navy">Latest inquiries</h5>
    @forelse($recentMessages as $m)
        <div class="d-flex justify-content-between align-items-center gap-3 py-3 {{ !$loop->last ? 'border-bottom' : '' }}">
            <div class="text-truncate">
                <p class="fw-semibold text-navy small mb-1">{{ $m->name }} <span class="fw-normal text-secondary">{{ $m->email }}</span></p>
                <p class="small text-secondary mb-0 text-truncate">{{ $m->message }}</p>
            </div>
            <span class="badge rounded-pill {{ $m->read ? 'text-bg-secondary' : 'text-bg-warning' }}">{{ $m->read ? 'Read' : 'New' }}</span>
        </div>
    @empty
        <p class="small text-secondary py-4 mb-0">No contact messages yet.</p>
    @endforelse
    <a href="{{ route('admin.messages.index') }}" class="small fw-bold text-brand">View all messages →</a>
</div>
@endsection
