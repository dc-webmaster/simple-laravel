@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Daftar Post</h4>
        <p class="text-muted mb-0">Kelola semua post Anda</p>
    </div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Buat Post
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td class="text-muted small">{{ $post->id }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none fw-semibold text-dark">
                            {{ $post->title }}
                        </a>
                        <div class="text-muted small text-truncate" style="max-width:300px">{{ $post->content }}</div>
                    </td>
                    <td class="small">{{ $post->user->name }}</td>
                    <td>
                        <span class="badge {{ $post->status === 'published' ? 'badge-published' : 'badge-draft' }}">
                            {{ $post->status }}
                        </span>
                    </td>
                    <td class="small text-muted">{{ $post->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-eye"></i>
                            </a>
                            @can('update', $post)
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                onsubmit="return confirm('Hapus post ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">
                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                        Belum ada post. <a href="{{ route('posts.create') }}">Buat sekarang!</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($posts->hasPages())
    <div class="p-3">{{ $posts->links() }}</div>
    @endif
</div>
@endsection
