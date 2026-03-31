@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Dashboard</h4>
        <p class="text-muted mb-0">Selamat datang, {{ $user->name }}!
            @if($user->isAdmin())
                <span class="badge bg-danger ms-1">Admin</span>
            @endif
        </p>
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Buat Post
    </a>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3" style="border-color:#6366f1;">
            <div class="text-muted small mb-1">Total Posts</div>
            <div class="fs-2 fw-bold text-indigo">{{ $stats['total_posts'] }}</div>
            <div class="text-muted small"><i class="bi bi-file-text"></i> semua post</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3" style="border-color:#22c55e;">
            <div class="text-muted small mb-1">Post Saya</div>
            <div class="fs-2 fw-bold text-success">{{ $stats['my_posts'] }}</div>
            <div class="text-muted small"><i class="bi bi-person"></i> milik Anda</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3" style="border-color:#f59e0b;">
            <div class="text-muted small mb-1">Published</div>
            <div class="fs-2 fw-bold text-warning">{{ $stats['published_posts'] }}</div>
            <div class="text-muted small"><i class="bi bi-check-circle"></i> dipublikasikan</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3" style="border-color:#94a3b8;">
            <div class="text-muted small mb-1">Draft</div>
            <div class="fs-2 fw-bold text-secondary">{{ $stats['draft_posts'] }}</div>
            <div class="text-muted small"><i class="bi bi-pencil"></i> belum publish</div>
        </div>
    </div>
</div>

@if($user->isAdmin() && isset($stats['total_users']))
<div class="row g-3 mb-4">
    <div class="col-lg-4">
        <div class="card stat-card p-3" style="border-color:#ec4899;">
            <div class="text-muted small mb-1">Total Users</div>
            <div class="fs-2 fw-bold" style="color:#ec4899;">{{ $stats['total_users'] }}</div>
            <div class="text-muted small"><i class="bi bi-people"></i> pengguna terdaftar</div>
        </div>
    </div>
</div>
@endif

<div class="row g-3">
    {{-- Recent Posts --}}
    <div class="col-lg-8">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Post Terbaru</h6>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            @forelse($recentPosts as $post)
            <div class="d-flex justify-content-between align-items-start py-2 border-bottom">
                <div>
                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none fw-semibold text-dark">
                        {{ $post->title }}
                    </a>
                    <div class="text-muted small">oleh {{ $post->user->name }} &bull; {{ $post->created_at->diffForHumans() }}</div>
                </div>
                <span class="badge {{ $post->status === 'published' ? 'badge-published' : 'badge-draft' }} ms-2">
                    {{ $post->status }}
                </span>
            </div>
            @empty
            <p class="text-muted text-center py-3">Belum ada post.</p>
            @endforelse
        </div>
    </div>

    {{-- API Info --}}
    <div class="col-lg-4">
        <div class="card p-3">
            <h6 class="fw-bold mb-3"><i class="bi bi-code-slash me-2"></i>API Endpoints</h6>
            <div class="small">
                <div class="fw-semibold text-muted mb-2">Auth</div>
                <code class="d-block mb-1">POST /api/register</code>
                <code class="d-block mb-1">POST /api/login</code>
                <code class="d-block mb-3">POST /api/logout</code>
                <div class="fw-semibold text-muted mb-2">Posts (Bearer Token)</div>
                <code class="d-block mb-1">GET /api/posts</code>
                <code class="d-block mb-1">POST /api/posts</code>
                <code class="d-block mb-1">GET /api/posts/{id}</code>
                <code class="d-block mb-1">PUT /api/posts/{id}</code>
                <code class="d-block mb-1">DELETE /api/posts/{id}</code>
            </div>
        </div>
    </div>
</div>
@endsection
