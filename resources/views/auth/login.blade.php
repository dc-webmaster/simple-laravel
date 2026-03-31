@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card p-4">
    <h5 class="fw-bold mb-1">Selamat Datang!</h5>
    <p class="text-muted small mb-4">Masuk ke akun Anda</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="email@example.com" autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="••••••••">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label text-muted small" for="remember">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 fw-semibold">
            <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
    </form>

    <hr>
    <p class="text-center text-muted small mb-0">
        Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Daftar sekarang</a>
    </p>

    <div class="mt-3 p-3 bg-light rounded small text-muted">
        <strong>Demo akun:</strong><br>
        Admin: admin@example.com / password<br>
        User: user@example.com / password
    </div>
</div>
@endsection
