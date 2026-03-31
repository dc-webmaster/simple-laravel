@extends('layouts.app')

@section('title', 'Buat Post')

@section('content')
<div class="mb-4">
    <a href="{{ route('posts.index') }}" class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke daftar
    </a>
    <h4 class="fw-bold mt-1 mb-0">Buat Post Baru</h4>
</div>

<div class="card p-4" style="max-width: 720px;">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="form-control @error('title') is-invalid @enderror"
                placeholder="Masukkan judul post...">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Konten <span class="text-danger">*</span></label>
            <textarea name="content" rows="8"
                class="form-control @error('content') is-invalid @enderror"
                placeholder="Tulis konten post di sini...">{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Simpan Post
            </button>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
