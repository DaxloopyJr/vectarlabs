@php($footServices = \App\Models\Service::published()->get())
<footer class="footer-dark pt-5">
    <div class="container" style="max-width: 72rem;">
        <div class="row g-5 pb-5">
            <div class="col-md-5">
                <a href="{{ route('home') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                    <span class="logo-mark">V</span>
                    <span class="font-display fw-bold text-white">Vectarlabs</span>
                </a>
                <p class="mt-3 font-serif-body" style="max-width: 20rem;">
                    Engineering scalable web platforms, bespoke management systems, and cloud
                    architectures for educational institutions and growing enterprises.
                </p>
            </div>
            <div class="col-6 col-md-2">
                <h6 class="font-display text-white">Company</h6>
                <ul class="list-unstyled small d-grid gap-2 mt-3">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('team') }}">Team</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <h6 class="font-display text-white">Services</h6>
                <ul class="list-unstyled small d-grid gap-2 mt-3">
                    @foreach($footServices as $s)
                        <li><a href="{{ route('services.show', $s->slug) }}">{{ $s->title_line1 }} {{ $s->title_line2 }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-md-2">
                <h6 class="font-display text-white">Legal</h6>
                <ul class="list-unstyled small d-grid gap-2 mt-3">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 py-4 border-top border-secondary small">
            <span>© 2026 Vectarlabs. All rights reserved. Built for school systems &amp; software innovation.</span>
            <span class="d-flex gap-3">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-github"></i></a>
            </span>
        </div>
    </div>
</footer>
