@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="card p-4">
    <h5 class="fw-bold mb-1">Buat Akun Baru</h5>
    <p class="text-muted small mb-4">Isi data di bawah untuk mendaftar</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="John Doe" autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="email@example.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Min. 8 karakter">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="form-control"
                placeholder="Ulangi password">
        </div>

        <button type="submit" class="btn btn-primary w-100 fw-semibold">
            <i class="bi bi-person-plus me-2"></i>Daftar
        </button>
    </form>

    <hr>
    <p class="text-center text-muted small mb-0">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Login di sini</a>
    </p>
</div>
@endsection
