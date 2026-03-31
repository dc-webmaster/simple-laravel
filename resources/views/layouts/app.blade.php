<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #1e293b; }
        .sidebar .nav-link { color: #94a3b8; padding: .5rem 1rem; border-radius: .375rem; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background: #334155; }
        .sidebar .nav-link i { width: 20px; }
        .main-content { background: #f8fafc; min-height: 100vh; }
        .card { border: none; box-shadow: 0 1px 3px rgba(0,0,0,.1); border-radius: .75rem; }
        .stat-card { border-left: 4px solid; }
        .badge-published { background: #dcfce7; color: #16a34a; }
        .badge-draft { background: #fef9c3; color: #ca8a04; }
    </style>
</head>
<body>
<div class="d-flex">
    {{-- Sidebar --}}
    <div class="sidebar p-3" style="width: 250px; flex-shrink: 0;">
        <div class="text-white fw-bold fs-5 mb-4 px-1">
            <i class="bi bi-rocket-takeoff me-2"></i>Laravel App
        </div>
        <nav class="nav flex-column gap-1">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid me-2"></i>Dashboard
            </a>
            <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                <i class="bi bi-file-text me-2"></i>Posts
            </a>
            <a href="{{ route('posts.create') }}" class="nav-link">
                <i class="bi bi-plus-circle me-2"></i>Buat Post
            </a>
        </nav>
        <hr class="border-secondary">
        <div class="px-1 text-secondary small mb-2">{{ auth()->user()->name }}</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link btn btn-link w-100 text-start text-danger">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="main-content flex-grow-1 p-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
