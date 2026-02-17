<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tempok Selatan')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            overflow-x: hidden;
            width: 100%;
        }
    </style>

    @stack('styles')
</head>

<body class="{{ request()->routeIs('beranda') ? 'home' : '' }}">
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top 
    {{ request()->routeIs('beranda') ? 'navbar-transparent' : 'navbar-solid' }}">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" width="60" height="60" class="me-3">
                <div class="d-flex flex-column lh-sm">
                    <h5 class="mb-0 fw-bold text-white">Desa Tempok Selatan</h5>
                    <small class="text-light opacity-75">Kecamatan Tompaso</small>
                    <small class="text-light opacity-75">Kabupaten Minahasa</small>
                </div>
            </div>

            <button class="navbar-toggler text-white border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->routeIs('infografis') ? 'active' : '' }}" href="{{ route('infografis') }}">Infografis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->routeIs('berita.index') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a class="nav-link text-white fw-semibold {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link text-white fw-semibold" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer style="background-color: #b22222;" class="text-white py-4 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center text-md-start mb-3 mb-md-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Minahasa" width="70" height="80" class="img-fluid">
                    <p class="fw-bold mt-2 mb-0">Desa Tempok Selatan</p>
                    <p class="small mb-0">Jl. Pinatoroanta Jaga 1 Desa Tempok Selatan<br>Kode Pos: 95693</p>
                </div>

                <div class="col-md-9">
                    <div class="row justify-content-md-end text-center text-md-start">
                        <div class="col-md-4 col-sm-6 mb-3">
                            <h6 class="fw-bold">Alamat</h6>
                            <p class="small mb-0">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                Desa Tempok Selatan, Tompaso, Minahasa
                            </p>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-3">
                            <h6 class="fw-bold">Kontak</h6>
                            <p class="small mb-0">
                                <i class="bi bi-envelope-fill me-2"></i>
                                <a href="mailto:tempokselatan01@gmail.com" class="text-white text-decoration-none">tempokselatan01@gmail.com</a>
                            </p>
                            <p class="small mb-0">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <a href="" class="text-white text-decoration-none">+6285299984901</a>
                            </p>
                            <p class="small mb-0">
                                <i class="bi bi-facebook me-2"></i>
                                <a href="https://facebook.com/pemerintah.selatan.3" class="text-white text-decoration-none">Pemerintah Tempok Selatan</a>
                            </p>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-3">
                            <h6 class="fw-bold">Jam Pelayanan</h6>
                            <p class="small mb-0">Senin - Jumat: 08.00 - 17.00</p>
                            <p class="small mb-0">Sabtu & Minggu: Tutup</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-light my-3">

            <div class="d-md-flex justify-content-md-between align-items-center text-center">

                <p class="small mb-md-0 mb-2">
                    &copy; {{ date('Y') }} Pemerintah Desa Tempok Selatan
                </p>

                <div class="small text-md-end" style="opacity: 0.8;">
                    <img src="{{ asset('images/logo-universitas.png') }}" alt="Logo Unsrat" style="height: 28px; vertical-align: middle; margin-right: 8px;">
                    Mahasiswa KKT 144 Universitas Sam Ratulangi
                </div>

            </div>
        </div>
    </footer>
    </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 30
        });
    </script>

    <!-- Chart Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js"></script>

    <!-- Navbar Scroll Effect (only on homepage) -->
    @if (request()->routeIs('beranda'))
    <script>
        const onScroll = () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                document.body.classList.add('scrolled');
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-solid');
            } else {
                document.body.classList.remove('scrolled');
                navbar.classList.add('navbar-transparent');
                navbar.classList.remove('navbar-solid');
            }
        };

        document.addEventListener('DOMContentLoaded', onScroll);
        window.addEventListener('scroll', onScroll);
    </script>
    @endif

    @stack('scripts')

</body>

</html>