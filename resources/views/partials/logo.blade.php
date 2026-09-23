@php($logoUrl = \App\Models\Setting::get('site.logo'))
@if($logoUrl)
    <img src="{{ $logoUrl }}" alt="{{ \App\Models\Setting::get('seo.site_name', 'Vectarlabs') }}" style="height: {{ $height ?? 34 }}px; width: auto;">
@else
    <span class="logo-mark" @if(!empty($height)) style="width: {{ $height }}px; height: {{ $height }}px;" @endif>V</span>
@endif
