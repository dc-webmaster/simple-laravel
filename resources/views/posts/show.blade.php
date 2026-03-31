@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="mb-4">
    <a href="{{ route('posts.index') }}" class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i>Kembali ke daftar
    </a>
</div>

<div class="card p-4" style="max-width: 720px;">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <span class="badge {{ $post->status === 'published' ? 'badge-published' : 'badge-draft' }}">
            {{ $post->status }}
        </span>
        @can('update', $post)
        <div class="d-flex gap-2">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-pencil me-1"></i>Edit
            </a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}"
                onsubmit="return confirm('Hapus post ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash me-1"></i>Hapus
                </button>
            </form>
        </div>
        @endcan
    </div>

    <h3 class="fw-bold mb-2">{{ $post->title }}</h3>

    <div class="text-muted small mb-4">
        <i class="bi bi-person me-1"></i>{{ $post->user->name }}
        &bull;
        <i class="bi bi-clock me-1"></i>{{ $post->created_at->format('d M Y, H:i') }}
        @if($post->updated_at != $post->created_at)
            &bull; <span class="fst-italic">diedit {{ $post->updated_at->diffForHumans() }}</span>
        @endif
    </div>

    <hr>

    <div class="post-content" style="line-height: 1.8; white-space: pre-wrap;">{{ $post->content }}</div>
</div>
@endsection
