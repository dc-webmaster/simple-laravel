<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Regular user
        $user = User::create([
            'name'     => 'User Biasa',
            'email'    => 'user@example.com',
            'password' => Hash::make('password'),
            'role'     => 'user',
        ]);

        // Sample posts
        $posts = [
            ['title' => 'Selamat Datang di Laravel 11', 'content' => 'Laravel 11 hadir dengan fitur-fitur baru yang luar biasa...', 'status' => 'published'],
            ['title' => 'Tutorial CRUD Laravel', 'content' => 'Cara membuat CRUD sederhana dengan Laravel...', 'status' => 'published'],
            ['title' => 'REST API dengan Sanctum', 'content' => 'Panduan membuat REST API menggunakan Laravel Sanctum...', 'status' => 'published'],
            ['title' => 'Draft Post', 'content' => 'Ini adalah draft yang belum dipublikasikan...', 'status' => 'draft'],
        ];

        foreach ($posts as $i => $post) {
            Post::create(array_merge($post, [
                'user_id' => $i % 2 === 0 ? $admin->id : $user->id,
            ]));
        }
    }
}
