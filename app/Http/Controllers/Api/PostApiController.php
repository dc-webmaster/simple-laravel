<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('user:id,name')
            ->latest()
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data'    => $posts,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'status'  => ['required', 'in:draft,published'],
        ]);

        $post = $request->user()->posts()->create($validated);
        $post->load('user:id,name');

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dibuat',
            'data'    => $post,
        ], 201);
    }

    public function show(Post $post)
    {
        $post->load('user:id,name');

        return response()->json([
            'success' => true,
            'data'    => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        if ($request->user()->id !== $post->user_id && ! $request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan',
            ], 403);
        }

        $validated = $request->validate([
            'title'   => ['sometimes', 'string', 'max:255'],
            'content' => ['sometimes', 'string'],
            'status'  => ['sometimes', 'in:draft,published'],
        ]);

        $post->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil diperbarui',
            'data'    => $post,
        ]);
    }

    public function destroy(Request $request, Post $post)
    {
        if ($request->user()->id !== $post->user_id && ! $request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan',
            ], 403);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dihapus',
        ]);
    }
}
