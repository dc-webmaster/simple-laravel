<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .card { border: none; border-radius: 1rem; box-shadow: 0 20px 60px rgba(0,0,0,.3); }
        .btn-primary { background: #667eea; border-color: #667eea; }
        .btn-primary:hover { background: #5a67d8; border-color: #5a67d8; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">
    <div style="width: 100%; max-width: 420px;">
        <div class="text-center text-white mb-4">
            <i class="bi bi-rocket-takeoff fs-1"></i>
            <h4 class="mt-2 fw-bold">Laravel App</h4>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
