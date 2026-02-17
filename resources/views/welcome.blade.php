<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Desa')</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        nav.navbar {
            background-color: #198754;
        }
        nav a.nav-link, nav a.navbar-brand {
            color: white !important;
        }
        footer {
            background-color: #198754;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Desa Tempok Selatan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="/profil" class="nav-link">Profil Desa</a></li>
                    <li class="nav-item"><a href="/berita" class="nav-link">Berita</a></li>
                    <li class="nav-item"><a href="/kontak" class="nav-link">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p class="mb-0">© {{ date('Y') }} Desa Tempok Selatan. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>