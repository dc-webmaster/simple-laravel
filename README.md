# 🚀 Laravel 11 Starter App

Aplikasi Laravel 11 lengkap dengan Authentication, CRUD, REST API, dan Admin Dashboard.

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql)
![License](https://img.shields.io/badge/license-MIT-green)

## ✨ Fitur

- **Authentication** — Login, Register, Logout (session-based & API token)
- **CRUD Posts** — Create, Read, Update, Delete dengan authorization policy
- **REST API** — Full API dengan Laravel Sanctum Bearer Token
- **Admin Dashboard** — Statistik, role admin/user
- **GitHub Actions CI** — Auto testing saat push ke GitHub

## 📋 Persyaratan

- PHP >= 8.2
- Composer
- MySQL 8.0+
- Node.js (opsional, untuk asset build)

## ⚡ Instalasi

```bash
# 1. Clone repository
git clone https://github.com/username/laravel-app.git
cd laravel-app

# 2. Install dependencies
composer install

# 3. Copy dan konfigurasi .env
cp .env.example .env
php artisan key:generate

# 4. Edit .env — sesuaikan database
DB_DATABASE=laravel_app
DB_USERNAME=root
DB_PASSWORD=your_password

# 5. Buat database & jalankan migrasi
php artisan migrate --seed

# 6. Jalankan server
php artisan serve
```

Buka browser: **http://localhost:8000**

## 👤 Akun Demo (setelah seeding)

| Role  | Email                 | Password |
|-------|-----------------------|----------|
| Admin | admin@example.com     | password |
| User  | user@example.com      | password |

## 🔌 API Endpoints

Base URL: `http://localhost:8000/api`

### Auth (Publik)
| Method | Endpoint       | Deskripsi        |
|--------|---------------|------------------|
| POST   | /register     | Daftar akun baru |
| POST   | /login        | Login & dapatkan token |

### Posts (Butuh Bearer Token)
| Method | Endpoint       | Deskripsi        |
|--------|---------------|------------------|
| GET    | /posts        | Daftar semua post |
| POST   | /posts        | Buat post baru   |
| GET    | /posts/{id}   | Detail post      |
| PUT    | /posts/{id}   | Update post      |
| DELETE | /posts/{id}   | Hapus post       |

### Contoh Request API

```bash
# Login
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@example.com","password":"password"}'

# Get posts dengan token
curl http://localhost:8000/api/posts \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

## 📁 Struktur Project

```
laravel-app/
├── app/
│   ├── Http/Controllers/
│   │   ├── Api/              # API Controllers
│   │   ├── Auth/             # Auth Controllers
│   │   ├── DashboardController.php
│   │   └── PostController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Post.php
│   └── Policies/
│       └── PostPolicy.php
├── database/
│   ├── migrations/           # Schema database
│   └── seeders/              # Data awal
├── resources/views/
│   ├── auth/                 # Login & Register
│   ├── dashboard/            # Admin Dashboard
│   ├── layouts/              # Template utama
│   └── posts/                # CRUD Posts
├── routes/
│   ├── web.php               # Web routes
│   └── api.php               # API routes
└── .github/workflows/        # CI/CD
    └── ci.yml
```

## 🚀 Upload ke GitHub

```bash
# Inisialisasi git (jika belum)
git init
git add .
git commit -m "Initial commit: Laravel 11 starter app"

# Hubungkan ke GitHub
git remote add origin https://github.com/username/laravel-app.git
git branch -M main
git push -u origin main
```

## 📝 Lisensi

MIT License — bebas digunakan dan dimodifikasi.
