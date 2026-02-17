@extends('layouts.app')

@section('title', 'Beranda Desa Tempok Selatan')

@section('content')

<!-- Hero Section -->
<section id="beranda" class="hero position-relative">

    <!--
   <div id="carouselHero" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/image.jpg') }}" class="d-block w-100 hero-img" alt="Pemandangan Desa">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/image2.jpg') }}" class="d-block w-100 hero-img" alt="Kegiatan Masyarakat">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/image3.jpg') }}" class="d-block w-100 hero-img" alt="Potensi Alam">
            </div>
        </div>
    </div>
    -->

    <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
        Browser kamu tidak mendukung tag video.
    </video>

    <!-- Overlay dan Teks -->
    <div class="hero-overlay"></div>
    <div class="hero-text text-center text-white">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__slideInRight">Selamat Datang di Desa Tempok Selatan</h1>
        <p class="lead animate__animated animate__slideInLeft">Kecamatan Tompaso Kabupaten Minahasa</p>
    </div>
</section>

<!-- Sambutan -->
<section id="sambutan" class="container py-5" data-aos="fade-up">
    <div class="row align-items-center g-4">

        <div class="col-md-4 mx-auto text-center">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('images/kades.jpg') }}" alt="Kepala Desa" class="img-fluid rounded-circle shadow-sm" style="max-width: 300px;">
                <h5 class="mt-3 fw-bold text-success mb-1">MAX F. LANGI</h5>
                <p class="text-secondary mb-0">Kepala Desa Tempok Selatan</p>
            </div>
        </div>


        <div class="col-md-8">
            <h2 class="fw-bold text-success mb-3">Sambutan Hukum Tua</h2>
            <p class="text-secondary fs-5">
                "Selamat datang di Desa Tempok Selatan. Kami berkomitmen untuk membangun desa yang maju, mandiri,
                dan sejahtera melalui gotong royong dan inovasi di bidang pertanian dan peternakan"
            </p>
            <p class="text-secondary fs-5">
                Semoga website ini dapat menjadi sumber informasi yang bermanfaat bagi masyarakat desa maupun pengunjung
                dari luar. Terima kasih atas perhatian dan dukungannya."
            </p>
        </div>

    </div>
</section>

<!-- Profil Singkat Desa -->
<section id="profil-singkat" class="container py-5" data-aos="fade-up">
    <h2 class="text-center fw-bold text-success mb-4">Profil Desa Tempok Selatan</h2>

    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <p class="text-secondary fs-5 mb-4">
                Desa Tempok Selatan merupakan salah satu desa di Kabupaten Tompaso yang memiliki potensi unggulan di bidang pertanian dan peternakan.
            </p>

            <a href="{{ route('profile') }}" class="btn btn-success px-4 py-2 rounded-pill">
                Lihat Detail Profil
            </a>
        </div>
    </div>
</section>

<!-- Berita -->
<section id="berita" class="container py-5" data-aos="fade-up">
    <h2 class="text-center fw-bold text-success mb-5">Berita & Pengumuman Terbaru</h2>

    <div class="row g-4">
        @forelse($beritaTerbaru as $berita)
        <div class="col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100 rounded-4 hover-card">
                <img src="{{ asset('images/berita/' . $berita->gambar) }}" class="card-img-top rounded-top-4" style="height:220px; object-fit:cover;" alt="{{ $berita->judul }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-success">{{ Str::limit($berita->judul, 60) }}</h5>
                    <small class="text-muted d-block mb-2">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}</small>
                    <p class="card-text text-secondary">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-outline-success btn-sm mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted">Belum ada berita tersedia.</p>
        @endforelse
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('berita.index') }}" class="btn btn-success px-4 py-2 rounded-pill">Lihat Semua Berita</a>
    </div>
</section>


<!-- Potensi Desa -->
<section id="potensi" class="bg-light py-5" data-aos="fade-up">
    <div class="container text-center">
        <h2 class="fw-bold text-success mb-4">Video Potensi Desa Tempok Selatan</h2>
        <p class="text-secondary fs-5 mb-4">
            Desa Tempok Selatan memiliki potensi di bidang pertanian, peternakan, dan budaya tradisional yang terus dilestarikan oleh masyarakat.
            Berikut adalah video singkat yang menampilkan keindahan dan semangat desa kami.
        </p>

        <!-- Video Embed -->
        <div class="ratio ratio-16x9 shadow-lg rounded-4 overflow-hidden">
            <iframe src="https://www.youtube.com/embed/5FrhtahQiRc" title="Video Potensi Desa Tempok Selatan" loading="lazy" allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

<!-- Lokasi Desa -->
<section id="lokasi" class="container py-5" data-aos="fade-up">
    <h2 class="text-center fw-bold text-success mb-4">Lokasi Desa Tempok Selatan</h2>
    <p class="text-center text-secondary fs-5 mb-4">
        Desa Tempok Selatan terletak di wilayah Kabupaten Tompaso, dengan akses mudah menuju area pertanian dan wisata sekitar.
    </p>

    <div class="ratio ratio-16x9 shadow-sm rounded-4 overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3988.967285777317!2d124.80708134708252!3d1.1834294974062336!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328747493a3126f7%3A0xa1b787b828bb8d9e!2sKantor%20Hukum%20Tua%20Desa%20Tempok%20Selatan!5e0!3m2!1sen!2sid!4v1761289598628!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Tambahkan jarak ke tombol -->
    <div class="text-center mt-4">
        <a href="{{ route('profile') }}#peta" class="btn btn-success px-4 py-2 rounded-pill shadow-sm">
            <i class="bi bi-geo-alt-fill me-2"></i>Lihat Lokasi Lengkap
        </a>
    </div>
</section>

<!-- Back to Top Button -->
<button id="backToTopBtn" class="btn btn-success rounded-circle shadow-lg" style="position: fixed; bottom: 40px; right: 40px; display: none; width:50px; height:50px; z-index:999;">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
    // tampilkan tombol saat scroll
    const backToTopBtn = document.getElementById("backToTopBtn");

    window.addEventListener("scroll", function() {
        if (window.scrollY > 300) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    });

    // scroll ke atas saat tombol diklik
    backToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>

@endsection