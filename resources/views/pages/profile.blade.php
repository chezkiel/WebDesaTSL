@extends('layouts.app')

@section('title', 'Profil Desa Tempok Selatan')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- ===== HERO / HEADER ===== -->
<section class="bg-white text-black text-center py-5" data-aos="fade-down">
    <div class="container">
        <h1 class="fw-bold mb-3">Profil Desa Tempok Selatan</h1>
        <p class="fs-5">Mengenal lebih dekat Desa Tempok Selatan, Kecamatan Tompaso, Kabupaten Minahasa</p>
    </div>
</section>

<!-- ===== 1. GAMBARAN UMUM ===== -->
<section id="gambaran-umum" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-5">Gambaran Umum Desa</h2>
        <div class="row align-items-center g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <p class="text-secondary fs-5 lh-lg mb-4">
                    <strong>Desa Tempok Selatan</strong> terletak di Kecamatan Tompaso, Kabupaten Minahasa, Provinsi Sulawesi Utara. Desa ini memiliki letak wilayah yang cukup strategis karena dilewati oleh jalan lintas kabupaten.
                    Jalur ini tidak hanya menjadi jalan alternatif, tetapi juga menghubungkan Kabupaten Minahasa dengan Minahasa Tenggara hingga ke Kabupaten Bolaang Mongondow Raya. Posisi strategis ini menjadi salah satu potensi besar untuk pengembangan perekonomian masyarakat desa.
                </p>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left">
                <div class="position-relative">
                    <img src="{{ asset('images/balaidesa.jpg') }}" alt="Balai Desa Tempok Selatan" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 2. SEJARAH ===== -->
<section id="sejarah" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-4">Sejarah Singkat Desa Tempok Selatan</h2>
        <p class="text-center text-secondary fs-5 mb-5 col-lg-8 mx-auto">
            Desa Tempok Selatan merupakan sebuah desa hasil pemekaran dari Desa Tempok pada tahun 2012. Desa ini adalah salah satu dari 10 desa yang ada di wilayah Kecamatan Tompaso. Kini, Desa Tempok Selatan terus berkembang dengan memanfaatkan berbagai potensi yang dimilikinya.
        </p>
        <div class="ratio ratio-16x9 shadow-lg rounded-4 overflow-hidden mb-5" data-aos="zoom-in">
            <img src="{{ asset('images/balaidesa.jpg') }}" alt="Sejarah Desa Tempok Selatan" class="w-100 h-100" style="object-fit: cover;">
        </div>

        <!-- Timeline Kepemimpinan
        <h3 class="text-center fw-bold text-success mb-4">Sejarah Kepemimpinan</h3>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="timeline">
                    @php
                    $kepemimpinan = [
                    ['tahun' => '2010-2016', 'nama' => '[Nama Hukum Tua 1]', 'periode' => 'Periode 1'],
                    ['tahun' => '2016-2022', 'nama' => '[Nama Hukum Tua 2]', 'periode' => 'Periode 2'],
                    ['tahun' => '2022-Sekarang', 'nama' => 'Max F. Langi', 'periode' => 'Periode 3'],
                    ];
                    @endphp

                    @foreach($kepemimpinan as $index => $k)
                    <div class="timeline-item mb-4" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-md-end mb-2 mb-md-0">
                                <span class="badge bg-success fs-6 px-3 py-2">{{ $k['tahun'] }}</span>
                            </div>
                            <div class="col-md-1 text-center d-none d-md-block">
                                <div class="timeline-dot bg-success rounded-circle mx-auto" style="width: 20px; height: 20px;"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-success mb-1">{{ $k['nama'] }}</h5>
                                        <p class="text-muted mb-0">{{ $k['periode'] }} - Hukum Tua Desa Tempok Selatan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        -->
    </div>
</section>

<!-- ===== 3. VISI & MISI ===== -->
<section id="visi-misi" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-4">Visi dan Misi Desa Tempok Selatan</h2>
        <p class="text-center text-secondary mb-5">Sebagai pedoman arah pembangunan desa dalam mewujudkan kesejahteraan masyarakat.</p>

        <div class="row justify-content-center g-4">
            <!-- Visi -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-3">Visi</h5>
                        <blockquote class="blockquote text-secondary fs-6 mb-0 fst-italic">
                            "Terwujudnya Desa Tempok Selatan yang maju, mandiri, dan sejahtera melalui pembangunan berkelanjutan, inovasi, dan gotong royong masyarakat."
                        </blockquote>
                    </div>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-3">Misi</h5>
                        <ol class="text-secondary mb-0 ps-3">
                            <li class="mb-2">Meningkatkan kualitas pendidikan dan sumber daya manusia desa.</li>
                            <li class="mb-2">Mendorong pertumbuhan ekonomi lokal melalui sektor pertanian dan UMKM.</li>
                            <li class="mb-2">Memperkuat partisipasi masyarakat dalam pembangunan desa.</li>
                            <li class="mb-2">Melestarikan budaya dan tradisi lokal.</li>
                            <li class="mb-0">Meningkatkan sarana dan prasarana desa secara berkelanjutan.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 4. BUDAYA ===== -->
<section id="budaya" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-5">Kearifan Lokal dan Budaya</h2>

        <div class="row g-4 mb-5">
            <div class="col-md-6" data-aos="fade-up">
                <div class="card h-100 shadow-sm rounded-4 border-0 p-4">
                    <h5 class="fw-bold text-success mb-3">
                        <i class="bi bi-calendar-event me-2"></i>Budaya & Tradisi
                    </h5>
                    <p class="text-secondary mb-0">
                        Masyarakat Desa Tempok Selatan menjunjung tinggi nilai adat istiadat dan tradisi.
                        Kegiatan budaya seperti syukuran panen masih rutin dilaksanakan sebagai bagian dari kehidupan sosial dan spiritual warga.
                    </p>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-up">
                <div class="card h-100 shadow-sm rounded-4 border-0 p-4">
                    <h5 class="fw-bold text-success mb-3">
                        <i class="bi bi-heart me-2"></i>Kearifan Lokal
                    </h5>
                    <p class="text-secondary mb-3">
                        Nilai solidaritas dan kebersamaan menjadi ciri khas sosial yang mempererat hubungan antarwarga.
                    </p>

                    <h6 class="fw-semibold text-success mb-2">Sistem Gotong Royong:</h6>
                    <p class="text-secondary mb-0">
                        Potensi gotong royong di desa ini masih sangat tinggi. Ini terwujud dalam berbagai kegiatan, seperti:
                    </p>
                    <ul class="text-secondary mb-0">
                        <li><strong>Mapalus:</strong> Sistem tolong-menolong tradisional dalam pertanian dan kehidupan sosial.</li>
                        <li><strong>Kerja bakti:</strong> Kegiatan rutin untuk membersihkan lingkungan desa secara bersama-sama.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12" data-aos="fade-up">
                <div class="card shadow-sm rounded-4 border-0 p-4">
                    <h5 class="fw-bold text-success mb-3 text-center">
                        <i class="bi bi-cup-hot me-2"></i>Kuliner Khas Desa
                    </h5>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body">
                                    <h6 class="fw-semibold mb-2">PIA KARAPI TOMPASO</h6>
                                    <p class="text-secondary small mb-0">
                                        Ini adalah produk industri rumahan unggulan dari Desa Tempok Selatan.
                                        Pia Karapi dikenal sebagai kuliner khas yang telah dipasarkan hingga ke luar daerah Sulawesi Utara.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 5. POTENSI EKONOMI ===== -->
<section id="potensi" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-5">Potensi Ekonomi dan Alam</h2>

        <div class="row g-4">
            <!-- Pertanian -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                <div class="card h-100 shadow-sm rounded-4 border-0 overflow-hidden hover-card">
                    <img src="{{ asset('images/potensi-pertanian.jpg') }}" class="card-img-top" alt="Pertanian" style="height:220px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold mb-3">
                            <i class="bi bi-tree me-2"></i>Pertanian
                        </h5>
                        <p class="text-secondary mb-3">Sektor utama desa adalah perkebunan, dengan holtikultura (sayur-mayur) sebagai komoditas unggulan.</p>

                        <h6 class="fw-semibold small mb-2">Detail:</h6>
                        <ul class="small text-secondary mb-0">
                            <li>Tanaman utama: Holtikultura (Sayur Mayur)</li>
                            <li>Tanaman Musiman: Jagung, Padi</li>
                            <li>Penunjang Pangan: Lahan pertanian warga</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Peternakan -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                <div class="card h-100 shadow-sm rounded-4 border-0 overflow-hidden hover-card">
                    <img src="{{ asset('images/potensi-peternakan.jpg') }}" class="card-img-top" alt="Peternakan" style="height:220px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold mb-3">
                            <i class="bi bi-egg me-2"></i>Peternakan
                        </h5>
                        <p class="text-secondary mb-3">Desa Tempok Selatan terkenal dengan potensi masyarakatnya dalam perkembangbiakan Sapi.</p>

                        <h6 class="fw-semibold small mb-2">Detail:</h6>
                        <ul class="small text-secondary mb-0">
                            <li>Potensi Utama: Ternak Sapi</li>
                            <li>Status: Dikenal sebagai desa peternak sapi di Sulut</li>
                            <li>Pemasaran: Dijual hingga ke Sulawesi Tengah & Selatan</li>
                            <li>Industri: Peternakan Khusus Sapi Pejantan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- UMKM & Kerajinan -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                <div class="card h-100 shadow-sm rounded-4 border-0 overflow-hidden hover-card">
                    <img src="{{ asset('images/potensi-umkm.jpg') }}" class="card-img-top" alt="UMKM & Kerajinan" style="height:220px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-success fw-bold mb-3">
                            <i class="bi bi-shop me-2"></i>UMKM & Industri
                        </h5>
                        <p class="text-secondary mb-3">Industri rumahan berkembang pesat, terutama di sektor kuliner dan sebagai pusat pengumpul hasil bumi.</p>

                        <h6 class="fw-semibold small mb-2">Detail:</h6>
                        <ul class="small text-secondary mb-0">
                            <li>Produk Unggulan: Kuliner "PIA KARAPI TOMPASO"</li>
                            <li>Pemasaran Pia: Hingga ke luar Sulawesi Utara</li>
                            <li>Potensi Lain: Penampung bahan holtikultura</li>
                            <li>Pasar Holtikultura: Dipasarkan ke Pulau Jawa dan Papua</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 6. MATA PENCAHARIAN UTAMA ===== -->
<section id="mata-pencaharian" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-4">Mata Pencaharian Utama</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <p class="text-secondary fs-5 lh-lg text-center mb-0">
                            Mayoritas masyarakat Desa Tempok Selatan bermata pencaharian di <strong>sektor perkebunan holtikultura (sayur mayur)</strong>. Selain itu, <strong>peternakan sapi</strong> juga menjadi potensi utama yang terkenal di wilayah ini.
                            Sebagian warga juga mengelola lahan untuk tanaman musiman seperti <strong>jagung dan padi</strong>. Sektor industri rumahan juga berkembang, ditandai dengan produk kuliner khas seperti <strong>"Pia Karapi Tompaso"</strong> yang telah dipasarkan ke luar daerah.
                        </p>
                        <div class="text-center mt-4">
                            <a href="{{ route('infografis') }}" class="btn btn-success rounded-pill px-4">
                                Lihat Data Lengkap di Infografis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 7. KELEMBAGAAN ===== -->
<section id="kelembagaan" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-5">Unsur Kelembagaan Desa</h2>
        <div class="accordion accordion-flush" id="accordionKelembagaan">

            <div class="accordion-item border rounded-3 mb-2">
                <h2 class="accordion-header" id="headinglpm">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapselpm" aria-expanded="false">
                        LPM (Lembaga Pemberdayaan Masyarakat)
                    </button>
                </h2>
                <div id="collapselpm" class="accordion-collapse collapse" data-bs-parent="#accordionKelembagaan">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <strong class="text-success">Ketua:</strong> <span class="text-secondary">[Nama Ketua LPM]</span><br>
                            <strong class="text-success">Status:</strong> <span class="text-secondary">Aktif (1 Unit)</span>
                        </div>
                        <p class="text-secondary mb-0">LPM berperan aktif dalam menyusun rencana pembangunan, menggerakkan partisipasi masyarakat, dan membantu pelaksanaan serta pengendalian pembangunan di desa.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-3 mb-2">
                <h2 class="accordion-header" id="headingpkk">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepkk" aria-expanded="false">
                        PKK (Pemberdayaan Kesejahteraan Keluarga)
                    </button>
                </h2>
                <div id="collapsepkk" class="accordion-collapse collapse" data-bs-parent="#accordionKelembagaan">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <strong class="text-success">Ketua:</strong> <span class="text-secondary">[Nama Ketua PKK]</span><br>
                            <strong class="text-success">Status:</strong> <span class="text-secondary">Aktif (1 Unit)</span>
                        </div>
                        <strong class="text-success d-block mb-2">Kegiatan:</strong>
                        <p class="text-secondary mb-0">PKK secara aktif mendukung 10 Program Pokok PKK, terutama melalui kegiatan Posyandu, pelatihan keterampilan untuk keluarga, dan penyuluhan kesehatan.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-3 mb-2">
                <h2 class="accordion-header" id="headingkarangtaruna">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsekarangtaruna" aria-expanded="false">
                        Karang Taruna
                    </button>
                </h2>
                <div id="collapsekarangtaruna" class="accordion-collapse collapse" data-bs-parent="#accordionKelembagaan">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <strong class="text-success">Ketua:</strong> <span class="text-secondary">[Nama Ketua Karang Taruna]</span><br>
                            <strong class="text-success">Status:</strong> <span class="text-danger">Tidak Aktif (1 Unit)</span>
                        </div>
                        <p class="text-secondary mb-0">Berdasarkan data profil desa, lembaga Karang Taruna saat ini berstatus tidak aktif.</p>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-3 mb-2">
                <h2 class="accordion-header" id="headingposyandu">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseposyandu" aria-expanded="false">
                        Posyandu (Pos Pelayanan Terpadu)
                    </button>
                </h2>
                <div id="collapseposyandu" class="accordion-collapse collapse" data-bs-parent="#accordionKelembagaan">
                    <div class="accordion-body">

                        <div class="mb-3">
                            <div class="card bg-light border-0 p-3">
                                <h6 class="fw-bold text-success mb-2">Posyandu Desa</h6>
                                <p class="small text-secondary mb-1"><strong>Jumlah:</strong> 1 Unit (Aktif)</p>
                                <p class="small text-secondary mb-1"><strong>Tenaga Kesehatan:</strong> 1 Bidan</p>
                                <p class="small text-secondary mb-0"><strong>Lokasi/Jadwal:</strong> [Informasi Lokasi & Jadwal]</p>
                            </div>
                        </div>

                        <strong class="text-success d-block mb-2">Layanan Posyandu:</strong>
                        <ul class="text-secondary mb-0">
                            <li>Pemeriksaan kesehatan ibu hamil dan balita</li>
                            <li>Penimbangan dan pengukuran pertumbuhan anak</li>
                            <li>Imunisasi</li>
                            <li>Pemberian vitamin dan makanan tambahan</li>
                            <li>Penyuluhan kesehatan dan gizi</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item border rounded-3 mb-2">
                <h2 class="accordion-header" id="headingbumdes">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsebumdes" aria-expanded="false">
                        BUMDes (Badan Usaha Milik Desa)
                    </button>
                </h2>
                <div id="collapsebumdes" class="accordion-collapse collapse" data-bs-parent="#accordionKelembagaan">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <strong class="text-success">Direktur:</strong> <span class="text-secondary">[Nama Direktur BUMDes]</span><br>
                            <strong class="text-success">Status:</strong> <span class="text-danger">Aktif (1 Unit)</span>
                        </div>
                        <p class="text-secondary mb-0">Tugas utama Badan Usaha Milik Desa (BUMDes) adalah menggerakkan perekonomian desa, meningkatkan kesejahteraan masyarakat, dan mengoptimalkan potensi desa.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== 8. STRUKTUR PEMERINTAHAN ===== -->
<section id="struktur" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-4">Struktur Pemerintahan Desa Tempok Selatan</h2>
        <p class="text-center text-secondary mb-5">Pemerintahan Desa Tempok Selatan dipimpin oleh Hukum Tua dan didukung oleh perangkat desa yang kompeten</p>

        <div class="row g-3 justify-content-center mb-5">
            @php
            $perangkat = [
            ['nama'=>'Max F Langi','jabatan'=>'Hukum Tua'],
            ['nama'=>'Jerry J Hasani','jabatan'=>'Sekretaris Desa'],
            ['nama'=>'Kettie Watuseke','jabatan'=>'Kepala Seksi Pemerintahan'],
            ['nama'=>'Marcel M Lengkey','jabatan'=>'Kepala Seksi Kesejahteraan'],
            ['nama'=>'Vannoh Dj Pantow','jabatan'=>'Kepala Urusan Umum'],
            ['nama'=>'Alfonda Singal','jabatan'=>'Kepala Urusan Keuangan'],
            ];
            @endphp

            @foreach($perangkat as $index => $p)
            <div class="col-md-4 col-sm-6" data-aos="fade-up">
                <div class="card shadow-sm rounded-4 h-100 border-0 hover-card">
                    <div class="card-body p-4 text-center">
                        <h5 class="text-success fw-bold mb-2">{{ $p['nama'] }}</h5>
                        <p class="mb-1 text-secondary">{{ $p['jabatan'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- BPD -->
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h5 class="text-center fw-bold text-success mb-3">
                            <i class="bi bi-people-fill me-2"></i>BPD (Badan Permusyawaratan Desa)
                        </h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong class="text-success">Ketua BPD:</strong> <span class="text-secondary">Ferry Turangan</span>
                            </div>
                            <div class="col-md-6">
                                <strong class="text-success">Jumlah Anggota:</strong> <span class="text-secondary">5 orang</span>
                            </div>
                        </div>
                        <strong class="text-success d-block mb-2">Fungsi BPD:</strong>
                        <ul class="text-secondary mb-0">
                            <li>Membahas dan menyepakati Rancangan Peraturan Desa bersama Kepala Desa</li>
                            <li>Menampung dan menyalurkan aspirasi masyarakat</li>
                            <li>Melakukan pengawasan kinerja Kepala Desa</li>
                            <li>Mengusulkan pengangkatan dan pemberhentian Kepala Desa</li>
                            <li>Membentuk panitia pemilihan Kepala Desa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 9. KEPALA JAGA & MEWETENG ===== -->
<section id="jaga" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success mb-3">Kepala Jaga & Meweteng</h2>
            <p class="text-muted">Perwakilan pemerintahan desa di tingkat jaga sebagai perpanjangan tangan pelayanan kepada masyarakat</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Jaga 1 -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="text-success fw-bold mb-3 text-center">
                            <i class="bi bi-geo-alt-fill me-2"></i>Jaga 1
                        </h5>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-2">
                                <div class="card bg-light border-0 p-3 h-100">
                                    <h6 class="fw-semibold text-success mb-1">Kepala Jaga</h6>
                                    <p class="mb-0">Shella A Rattu</p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="card bg-light border-0 p-3 h-100">
                                    <h6 class="fw-semibold text-success mb-1">Meweteng</h6>
                                    <p class="mb-0">Harold Loupatty</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jaga 2 -->
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="text-success fw-bold mb-3 text-center">
                            <i class="bi bi-geo-alt-fill me-2"></i>Jaga 2
                        </h5>
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-2">
                                <div class="card bg-light border-0 p-3 h-100">
                                    <h6 class="fw-semibold text-success mb-1">Kepala Jaga</h6>
                                    <p class="mb-0">Vano Suoth</p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="card bg-light border-0 p-3 h-100">
                                    <h6 class="fw-semibold text-success mb-1">Meweteng</h6>
                                    <p class="mb-0">Mario Korah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== 10. PETA WILAYAH & STATISTIK ===== -->
<section id="peta" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center fw-bold text-success mb-4">Peta Wilayah dan Data Desa</h2>
        <p class="text-center text-secondary fs-5 mb-5 col-lg-8 mx-auto">
            Informasi lengkap tentang letak geografis, batas wilayah, statistik penduduk, dan fasilitas umum Desa Tempok Selatan
        </p>

        <!-- Peta Interaktif -->
        <div class="row mb-5">
            <div class="col-12" data-aos="zoom-in">

                <div class="card shadow-sm rounded-4 overflow-hidden border mb-4">
                    <img src="{{ asset('images/petadesa.jpg') }}" class="img-fluid" alt="Peta Wilayah Desa Tempok Selatan">
                </div>

                <div class="card bg-light border-0 rounded-4">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold">Download Peta Resolusi Tinggi</h5>
                        <p class="text-secondary small mb-3">
                            File ini berformat PDF dan memiliki ukuran 41MB.
                        </p>
                        <a href="{{ asset('docs/TEMPOK SELATAN_R400.pdf') }}" class="btn btn-danger btn-lg rounded-pill px-4" download>
                            <i class="bi bi-download me-2"></i>
                            Download Peta (41 MB)
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Informasi Geografis -->
        <div class="row g-4">

            <div class="col-lg-6" data-aos="fade-right">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-4">
                            <i class="bi bi-globe me-2"></i>Informasi Geografis
                        </h5>

                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Koordinat</div>
                                <div class="col-7 text-muted">2°24'30" - 2°29'30"LS Dan 111°56'0" – 112°0'0” BT</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Ketinggian</div>
                                <div class="col-7 text-muted">6000-7000 ft AMSL (1.828 - 2.133 mdpl)</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Topografi</div>
                                <div class="col-7 text-muted">Dataran Tinggi</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Iklim</div>
                                <div class="col-7 text-muted">77 32 mm</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Suhu Rata-rata</div>
                                <div class="col-7 text-muted">25°C</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Luas Wilayah</div>
                                <div class="col-7 text-muted">99 ha</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Luas Perkebunan</div>
                                <div class="col-7 text-muted">xx ha</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Luas Pemukiman</div>
                                <div class="col-7 text-muted">xx ha</div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-5 text-success fw-semibold">Fasilitas Umum</div>
                                <div class="col-7 text-muted">xx ha</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-4">
                            <i class="bi bi-compass me-2"></i>Batas Wilayah
                        </h5>

                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Utara</div>
                                <div class="col-8 text-muted">Desa Tempok, Kelurahan Kinali, dan Desa Tondegesan</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Timur</div>
                                <div class="col-8 text-muted">Desa Liba</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Selatan</div>
                                <div class="col-8 text-muted">Desa Liba dan Desa Talikuran</div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Barat</div>
                                <div class="col-8 text-muted">Desa Pinaesaan dan desa Tompaso Dua</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-4">
                            <i class="bi bi-signpost-split me-2"></i>Jarak Tempuh
                        </h5>

                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Ke Ibukota Provinsi</div>
                                <div class="col-8 text-muted">179 km</div>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Ke Kabupaten/Kota</div>
                                <div class="col-8 text-muted">75 km</div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-4 text-success fw-semibold">Ke Kecamatan</div>
                                <div class="col-8 text-muted">700 Meter</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Fasilitas Umum -->
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-success mb-4 text-center">
                            <i class="bi bi-building me-2"></i>Fasilitas Umum Desa
                        </h5>

                        <div class="row g-4">
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-light border-0 h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-book-fill text-success fs-1 mb-3"></i>
                                        <h6 class="fw-bold mb-3">Pendidikan</h6>
                                        <ul class="list-unstyled text-start small mb-0">
                                            <li class="mb-2">SD/MI: <strong>0 unit</strong></li>
                                            <li class="mb-2">SMP/MTs: <strong>0 unit</strong></li>
                                            <li class="mb-2">SMA/SMK: <strong>0 unit</strong></li>
                                            <li>PAUD/TK: <strong>1 unit</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-light border-0 h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-hospital-fill text-danger fs-1 mb-3"></i>
                                        <h6 class="fw-bold mb-3">Kesehatan</h6>
                                        <ul class="list-unstyled text-start small mb-0">
                                            <li class="mb-2">Puskesmas: <strong>0 unit</strong> (1.5 km)</li>
                                            <li class="mb-2">Posyandu: <strong>1 unit</strong></li>
                                            <li>Klinik: <strong>0 unit</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-light border-0 h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-house-heart-fill text-warning fs-1 mb-3"></i>
                                        <h6 class="fw-bold mb-3">Ibadah</h6>
                                        <ul class="list-unstyled text-start small mb-0">
                                            <li class="mb-2">Gereja: <strong>2 unit</strong></li>
                                            <li class="mb-2">Masjid: <strong>0 unit</strong></li>
                                            <li>Lainnya: <strong>0 unit</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-light border-0 h-100">
                                    <div class="card-body text-center p-4">
                                        <i class="bi bi-trophy-fill text-info fs-1 mb-3"></i>
                                        <h6 class="fw-bold mb-3">Umum & Olahraga</h6>
                                        <ul class="list-unstyled text-start small mb-0">
                                            <li class="mb-2">Kantor Desa: <strong>1 unit</strong></li>
                                            <li class="mb-2">Balai Pertemuan: <strong>1 unit</strong></li>
                                            <li class="mb-2">Lapangan Sepak Bola: <strong>1 unit</strong></li>
                                            <li>Gedung Serbaguna: <strong>0 unit</strong></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('infografis') }}" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow">
                                Lihat Data Lengkap di Infografis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== BACK TO TOP ===== -->
<button id="backToTopBtn" class="btn btn-success rounded-circle shadow-lg" style="position: fixed; bottom: 40px; right: 40px; display: none; width:50px; height:50px; z-index:999;">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
    const backToTopBtn = document.getElementById("backToTopBtn");
    window.addEventListener("scroll", function() {
        backToTopBtn.style.display = window.scrollY > 300 ? "block" : "none";
    });
    backToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>

@endsection