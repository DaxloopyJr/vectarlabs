@extends('layouts.admin')

@section('content')
@php($editing = $slide->exists)
<div class="mb-4">
    <h1 class="font-display fw-black text-navy mb-1" style="font-weight: 900;">{{ $editing ? 'Edit slide' : 'New slide' }}</h1>
</div>

@if($errors->any())
    <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
@endif

<form method="POST" action="{{ $editing ? route('admin.slides.update', $slide) : route('admin.slides.store') }}" class="card-soft p-4" style="max-width: 52rem;" enctype="multipart/form-data">
    @csrf
    @if($editing) @method('PUT') @endif
    <div class="row g-3">
        <div class="col-12">
            <label class="form-label small fw-bold">Eyebrow / Badge</label>
            <input name="eyebrow" class="form-control" value="{{ old('eyebrow', $slide->eyebrow) }}" placeholder="Software · Cloud · Design">
        </div>
        <div class="col-sm-4">
            <label class="form-label small fw-bold">Title line 1 *</label>
            <input name="title1" class="form-control" required value="{{ old('title1', $slide->title1) }}">
        </div>
        <div class="col-sm-4">
            <label class="form-label small fw-bold">Title line 2</label>
            <input name="title2" class="form-control" value="{{ old('title2', $slide->title2) }}">
        </div>
        <div class="col-sm-4">
            <label class="form-label small fw-bold">Title line 3 (accent)</label>
            <input name="title3" class="form-control" value="{{ old('title3', $slide->title3) }}">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Subtitle</label>
            <textarea name="subtitle" rows="3" class="form-control">{{ old('subtitle', $slide->subtitle) }}</textarea>
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Button text</label>
            <input name="button_text" class="form-control" value="{{ old('button_text', $slide->button_text) }}" placeholder="Book Consultation">
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Button URL</label>
            <input name="button_url" class="form-control" value="{{ old('button_url', $slide->button_url) }}" placeholder="/contact">
        </div>
        <div class="col-12">
            <label class="form-label small fw-bold">Background image</label>
            <div class="d-flex align-items-start gap-3 flex-wrap">
                <div class="text-center">
                    <img id="photoPreview" src="{{ $slide->image_url ?: '' }}" alt="Preview"
                         class="rounded-2 border {{ $slide->image_url ? '' : 'd-none' }}"
                         style="width: 180px; height: 100px; object-fit: cover;">
                    <div id="previewPlaceholder" class="rounded-2 border d-flex align-items-center justify-content-center text-secondary {{ $slide->image_url ? 'd-none' : '' }}"
                         style="width: 180px; height: 100px; background: #f8f6f2;">
                        <i class="bi bi-image fs-1"></i>
                    </div>
                </div>
                <div class="flex-grow-1" style="min-width: 16rem;">
                    <input type="file" id="photoInput" name="image" accept="image/*" class="form-control">
                    <div id="photoLoading" class="d-none align-items-center gap-2 mt-2 small text-secondary">
                        <div class="spinner-border spinner-border-sm text-brand" role="status"></div>
                        <span id="photoLoadingText">Loading image…</span>
                    </div>
                    <div class="form-text">Optional hero background image. You can crop / resize before saving.</div>
                    <label class="form-label small fw-bold mt-2">…or paste an image URL</label>
                    <input name="image_url" id="photoUrlInput" class="form-control" value="{{ old('image_url', $slide->image_url) }}" placeholder="https://…">
                </div>
            </div>
            <div id="photoEditor" class="d-none mt-3 p-3 border rounded-2 bg-white">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="small fw-bold me-1">Crop:</span>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-secondary aspect-btn active" data-aspect="free">Free</button>
                        <button type="button" class="btn btn-outline-secondary aspect-btn" data-aspect="1.7778">16:9</button>
                        <button type="button" class="btn btn-outline-secondary aspect-btn" data-aspect="1">1:1</button>
                    </div>
                    <div class="btn-group btn-group-sm ms-2" role="group">
                        <button type="button" class="btn btn-outline-secondary" id="rotateLeft" title="Rotate left"><i class="bi bi-arrow-counterclockwise"></i></button>
                        <button type="button" class="btn btn-outline-secondary" id="rotateRight" title="Rotate right"><i class="bi bi-arrow-clockwise"></i></button>
                        <button type="button" class="btn btn-outline-secondary" id="zoomIn" title="Zoom in"><i class="bi bi-zoom-in"></i></button>
                        <button type="button" class="btn btn-outline-secondary" id="zoomOut" title="Zoom out"><i class="bi bi-zoom-out"></i></button>
                        <button type="button" class="btn btn-outline-secondary" id="resetCrop" title="Reset"><i class="bi bi-arrow-repeat"></i></button>
                    </div>
                </div>
                <div class="rounded-2 overflow-hidden" style="max-height: 420px; background: #f0ece4;">
                    <img id="editorImage" alt="" style="display: block; max-width: 100%;">
                </div>
                <div class="d-flex flex-wrap align-items-end gap-3 mt-3">
                    <div>
                        <label class="form-label small fw-bold mb-1">Resize (px)</label>
                        <div class="d-flex align-items-center gap-1">
                            <input type="number" id="resizeW" class="form-control form-control-sm" style="width: 6rem;" placeholder="W" min="16" max="4096">
                            <span class="text-secondary">×</span>
                            <input type="number" id="resizeH" class="form-control form-control-sm" style="width: 6rem;" placeholder="H" min="16" max="4096">
                        </div>
                        <div class="form-text" style="font-size: .7rem;">Leave empty to keep the cropped size.</div>
                    </div>
                    <div class="ms-auto d-flex gap-2">
                        <button type="button" id="applyEdit" class="btn btn-sm btn-dark"><i class="bi bi-check2"></i> Apply</button>
                        <button type="button" id="cancelEdit" class="btn btn-sm btn-outline-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <label class="form-label small fw-bold">Chips (comma separated)</label>
            <input name="chips" class="form-control" value="{{ old('chips', $slide->chips) }}" placeholder="Custom Web Platforms, Cloud Infrastructure, Mobile Applications">
        </div>
        <div class="col-sm-3">
            <label class="form-label small fw-bold">Sort order</label>
            <input name="sort_order" type="number" class="form-control" value="{{ old('sort_order', $slide->sort_order ?? 0) }}">
        </div>
        <div class="col-sm-3 d-flex align-items-end">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="published" value="1" id="published" @checked(old('published', $slide->published ?? true))>
                <label class="form-check-label small fw-semibold" for="published">Published</label>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-4">
        <button class="btn-brand" style="padding: .6rem 1.4rem;">Save</button>
        <a href="{{ route('admin.slides.index') }}" class="btn-dark-pill">Cancel</a>
    </div>
</form>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.6.2/dist/cropper.min.js"></script>
<script>
(function () {
    const fileInput   = document.getElementById('photoInput');
    const urlInput    = document.getElementById('photoUrlInput');
    const preview     = document.getElementById('photoPreview');
    const placeholder = document.getElementById('previewPlaceholder');
    const loading     = document.getElementById('photoLoading');
    const loadingText = document.getElementById('photoLoadingText');
    const editor      = document.getElementById('photoEditor');
    const editorImg   = document.getElementById('editorImage');

    let cropper = null;
    let objectUrl = null;

    function showLoading(text) { loadingText.textContent = text; loading.classList.remove('d-none'); loading.classList.add('d-flex'); }
    function hideLoading() { loading.classList.add('d-none'); loading.classList.remove('d-flex'); }
    function destroyEditor() {
        if (cropper) { cropper.destroy(); cropper = null; }
        editor.classList.add('d-none');
        if (objectUrl) { URL.revokeObjectURL(objectUrl); objectUrl = null; }
    }
    function setPreview(src) { preview.src = src; preview.classList.remove('d-none'); placeholder.classList.add('d-none'); }

    fileInput.addEventListener('change', function () {
        const file = this.files && this.files[0];
        if (!file) { destroyEditor(); return; }
        if (!file.type.startsWith('image/')) { alert('Please choose an image file.'); this.value = ''; return; }
        destroyEditor();
        showLoading('Loading image…');
        objectUrl = URL.createObjectURL(file);
        editorImg.onload = function () {
            hideLoading();
            editor.classList.remove('d-none');
            cropper = new Cropper(editorImg, { viewMode: 1, autoCropArea: 0.9, background: true });
            document.querySelectorAll('.aspect-btn').forEach(b => b.classList.toggle('active', b.dataset.aspect === 'free'));
        };
        editorImg.onerror = function () { hideLoading(); alert('Could not read that image. Try a different file.'); destroyEditor(); };
        editorImg.src = objectUrl;
    });

    document.querySelectorAll('.aspect-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.aspect-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            if (!cropper) return;
            cropper.setAspectRatio(this.dataset.aspect === 'free' ? NaN : parseFloat(this.dataset.aspect));
        });
    });
    document.getElementById('rotateLeft').addEventListener('click', () => cropper && cropper.rotate(-90));
    document.getElementById('rotateRight').addEventListener('click', () => cropper && cropper.rotate(90));
    document.getElementById('zoomIn').addEventListener('click', () => cropper && cropper.zoom(0.1));
    document.getElementById('zoomOut').addEventListener('click', () => cropper && cropper.zoom(-0.1));
    document.getElementById('resetCrop').addEventListener('click', () => cropper && cropper.reset());

    document.getElementById('applyEdit').addEventListener('click', function () {
        if (!cropper) return;
        showLoading('Applying edits…');
        const w = parseInt(document.getElementById('resizeW').value, 10);
        const h = parseInt(document.getElementById('resizeH').value, 10);
        const opts = { imageSmoothingQuality: 'high' };
        if (w > 0 && h > 0) { opts.width = w; opts.height = h; }
        else if (w > 0) { opts.width = w; }
        else if (h > 0) { opts.height = h; }
        cropper.getCroppedCanvas(opts).toBlob(function (blob) {
            const file = new File([blob], 'slide-edited.png', { type: 'image/png' });
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;
            const url = URL.createObjectURL(blob);
            setPreview(url);
            if (urlInput) urlInput.value = '';
            destroyEditor();
            hideLoading();
        }, 'image/png');
    });

    document.getElementById('cancelEdit').addEventListener('click', function () {
        destroyEditor();
        const file = fileInput.files && fileInput.files[0];
        if (file) setPreview(URL.createObjectURL(file));
    });

    urlInput.addEventListener('change', function () {
        if (this.value && !(fileInput.files && fileInput.files.length)) setPreview(this.value);
    });
})();
</script>
@endpush
