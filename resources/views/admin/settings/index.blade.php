@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <div>
        <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">Site Content</h1>
        <p class="small text-secondary mb-0">Editable copy for the Home, About, and Contact pages. Changes go live immediately.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.content.update') }}" style="max-width: 56rem;">
    @csrf
    @foreach($settings->groupBy(fn ($s) => ucfirst(explode('.', $s->key)[0]).' — '.ucfirst(explode('.', $s->key)[1] ?? 'general')) as $group => $items)
        <div class="card-soft p-4 mb-4">
            <h6 class="font-display fw-bold text-navy">{{ $group }}</h6>
            <div class="row g-3 mt-1">
                @foreach($items as $setting)
                    <div class="{{ strlen((string) $setting->value) > 60 ? 'col-12' : 'col-md-6' }}">
                        <label class="form-label text-secondary" style="font-size: .7rem; font-family: monospace;">{{ $setting->key }}</label>
                        @if(strlen((string) $setting->value) > 60)
                            <textarea name="settings[{{ $setting->key }}]" rows="2" class="form-control form-control-sm">{{ $setting->value }}</textarea>
                        @else
                            <input name="settings[{{ $setting->key }}]" class="form-control form-control-sm" value="{{ $setting->value }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <button class="btn-brand mb-5"><i class="bi bi-save"></i> Save all content</button>
</form>
@endsection
