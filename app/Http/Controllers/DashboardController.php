<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Stats for dashboard
        $stats = [
            'total_posts'     => Post::count(),
            'my_posts'        => Post::where('user_id', $user->id)->count(),
            'published_posts' => Post::published()->count(),
            'draft_posts'     => Post::draft()->count(),
        ];

        // Admin gets extra stats
        if ($user->isAdmin()) {
            $stats['total_users'] = User::count();
            $stats['recent_users'] = User::latest()->take(5)->get();
        }

        $recentPosts = Post::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'recentPosts', 'user'));
    }
}
