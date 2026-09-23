<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Vectarlabs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-navy-deep d-flex align-items-center justify-content-center min-vh-100">
    <div class="card border-0 shadow-lg rounded-4 p-4" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <span class="logo-mark" style="width: 48px; height: 48px; font-size: 1.4rem;">V</span>
                <h1 class="font-display fw-black text-navy mt-3" style="font-size: 1.4rem; font-weight: 900;">Vectarlabs Admin</h1>
                <p class="small text-secondary">Sign in to manage website content.</p>
            </div>
            @if($errors->any())
                <div class="alert alert-danger small">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
            @endif
            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-bold">Email</label>
                    <input name="email" type="email" class="form-control" required autofocus value="{{ old('email', 'admin@vectarlabs.com') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Password</label>
                    <input name="password" type="password" class="form-control" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label small" for="remember">Remember me</label>
                </div>
                <button class="btn-brand w-100 justify-content-center">Sign in</button>
            </form>
            <p class="text-center small text-secondary mt-3 mb-0">Default: admin@vectarlabs.com / admin123</p>
        </div>
    </div>
</body>
</html>
