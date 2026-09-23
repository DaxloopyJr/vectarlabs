@php($crumbs = $crumbs ?? [])
@if(count($crumbs))
<div class="breadcrumb-bar {{ !empty($dark) ? 'on-dark' : '' }}">
    <div class="container" style="max-width: 72rem;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @foreach($crumbs as $crumb)
                    @if(!$loop->last && !empty($crumb['url']))
                        <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>
@endif
