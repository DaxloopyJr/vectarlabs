@php($navServices = \App\Models\Service::published()->get())
<nav class="position-fixed top-0 start-0 end-0 mt-3 px-3" style="z-index: 1050;">
    <div class="container" style="max-width: 72rem;">
        <div class="navbar-pill d-flex align-items-center justify-content-between py-2 ps-4 pe-2">
            <a href="{{ route('home') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <span class="logo-mark">V</span>
                <span class="font-display fw-bold text-navy fs-5">Vectarlabs</span>
            </a>

            <ul class="nav d-none d-lg-flex align-items-center gap-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('about') || request()->routeIs('team*') || request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('about') }}" data-bs-toggle="dropdown">Company</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="dropdown-item" href="{{ route('team') }}">Our Team</a></li>
                        <li><a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('services*') ? 'active' : '' }}" href="{{ route('services') }}" data-bs-toggle="dropdown">Services</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('services') }}">All Services</a></li>
                        @foreach($navServices as $s)
                            <li><a class="dropdown-item" href="{{ route('services.show', $s->slug) }}">{{ $s->title_line1 }} {{ $s->title_line2 }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('industries*') ? 'active' : '' }}" href="{{ route('industries') }}">Industries</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('works*') ? 'active' : '' }}" href="{{ route('works') }}">Work</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('insights*') ? 'active' : '' }}" href="{{ route('insights') }}">Insights</a></li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('contact') }}" class="btn-brand d-none d-sm-inline-flex" style="padding: .55rem 1.3rem; font-size: .7rem;">Request demo</a>
                <button class="btn d-lg-none" data-bs-toggle="collapse" data-bs-target="#mobileNav"><i class="bi bi-list fs-4"></i></button>
            </div>
        </div>

        <div class="collapse d-lg-none mt-2" id="mobileNav">
            <div class="card border-0 shadow">
                <div class="list-group list-group-flush rounded">
                    <a class="list-group-item list-group-item-action" href="{{ route('home') }}">Home</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('about') }}">About Us</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('team') }}">Our Team</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('services') }}">Services</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('industries') }}">Industries</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('works') }}">Our Work</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('products') }}">Products</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('insights') }}">Insights</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</nav>
