<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .feature-card { border: none; border-radius: 1rem; transition: transform .2s; }
        .feature-card:hover { transform: translateY(-4px); }
    </style>
</head>
<body class="d-flex align-items-center">
    <div class="container py-5">
        <div class="text-center text-white mb-5">
            <i class="bi bi-rocket-takeoff" style="font-size: 3rem;"></i>
            <h1 class="fw-bold mt-3">Laravel 11 Starter App</h1>
            <p class="lead opacity-75">Authentication &bull; CRUD &bull; REST API &bull; Admin Dashboard</p>
            <div class="d-flex gap-2 justify-content-center mt-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg fw-semibold">
                        <i class="bi bi-grid me-2"></i>Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light btn-lg fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg fw-semibold">
                        <i class="bi bi-person-plus me-2"></i>Register
                    </a>
                @endauth
            </div>
        </div>

        <div class="row g-3 justify-content-center">
            @foreach([
                ['bi-shield-lock', 'Authentication', 'Login, Register, Logout dengan session & Sanctum token'],
                ['bi-grid-3x3-gap', 'CRUD Posts', 'Buat, baca, edit, dan hapus post dengan policy authorization'],
                ['bi-code-slash', 'REST API', 'Full API dengan Sanctum Bearer Token authentication'],
                ['bi-speedometer2', 'Dashboard', 'Admin dashboard dengan statistik dan role management'],
            ] as [$icon, $title, $desc])
            <div class="col-sm-6 col-lg-3">
                <div class="card feature-card p-4 h-100 text-center shadow-sm">
                    <i class="bi {{ $icon }} text-primary fs-2 mb-3"></i>
                    <h6 class="fw-bold">{{ $title }}</h6>
                    <p class="text-muted small mb-0">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
