@extends('layouts.app')

@section('title', 'Infografis Desa Tempok Selatan')

@section('content')

<!-- ====== HEADER SECTION ====== -->
<section id="header-infografis" class="py-5 bg-light" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Infografis Desa Tempok Selatan</h1>
        <p class="text-muted fs-5">
            Menampilkan data dan informasi penting Desa Tempok Selatan dalam bentuk visual yang informatif, interaktif, dan menarik.
        </p>
    </div>
</section>

<!-- ====== STATISTIK PENDUDUK ====== -->
<section id="statistik-penduduk" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Statistik Penduduk</h2>

        <div class="row text-center mb-4">
            @php
                $stats = [
                    ['label' => 'Total Penduduk', 'value' => $data->total_penduduk ?? 0, 'color' => 'text-dark', 'icon' => 'bi-people-fill'],
                    ['label' => 'Laki-laki', 'value' => $data->laki_laki ?? 0, 'color' => 'text-primary', 'icon' => 'bi-person-fill'],
                    ['label' => 'Perempuan', 'value' => $data->perempuan ?? 0, 'color' => 'text-danger', 'icon' => 'bi-person-fill'],
                    ['label' => 'Kepala Keluarga', 'value' => $data->jumlah_keluarga ?? 0, 'color' => 'text-success', 'icon' => 'bi-house-fill']
                ];
            @endphp

            @foreach ($stats as $s)
                <div class="col-md-3 col-6 mb-3">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <i class="bi {{ $s['icon'] }} fs-2 {{ $s['color'] }} mb-2"></i>
                            <h3 class="fw-bold {{ $s['color'] }} mb-1">{{ number_format($s['value']) }}</h3>
                            <p class="text-muted mb-0 small">{{ $s['label'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Grafik Statistik Penduduk -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div id="genderChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div id="ageChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div id="growthChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== STATISTIK PER JAGA ====== -->
<section id="statistik-jaga" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Statistik Penduduk per Jaga</h2>
        <p class="text-center text-muted mb-5">Data pembagian penduduk berdasarkan wilayah jaga</p>
        
        <div class="row g-4 justify-content-center">
            <!-- Jaga 1 -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="text-success fw-bold mb-4 text-center">
                            <i class="bi bi-geo-alt-fill me-2"></i>Jaga 1
                        </h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-people fs-2 text-primary mb-2"></i>
                                    <h4 class="fw-bold text-primary mb-1">{{ $data->jaga1_penduduk ?? 0 }}</h4>
                                    <small class="text-muted">Total Penduduk</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-house fs-2 text-success mb-2"></i>
                                    <h4 class="fw-bold text-success mb-1">{{ $data->jaga1_kk ?? 0 }}</h4>
                                    <small class="text-muted">Kepala Keluarga</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-gender-male fs-2 text-info mb-2"></i>
                                    <h4 class="fw-bold text-info mb-1">{{ $data->jaga1_laki ?? 0 }}</h4>
                                    <small class="text-muted">Laki-laki</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-gender-female fs-2 text-danger mb-2"></i>
                                    <h4 class="fw-bold text-danger mb-1">{{ $data->jaga1_perempuan ?? 0 }}</h4>
                                    <small class="text-muted">Perempuan</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jaga 2 -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="text-success fw-bold mb-4 text-center">
                            <i class="bi bi-geo-alt-fill me-2"></i>Jaga 2
                        </h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-people fs-2 text-primary mb-2"></i>
                                    <h4 class="fw-bold text-primary mb-1">{{ $data->jaga2_penduduk ?? 0 }}</h4>
                                    <small class="text-muted">Total Penduduk</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-house fs-2 text-success mb-2"></i>
                                    <h4 class="fw-bold text-success mb-1">{{ $data->jaga2_kk ?? 0 }}</h4>
                                    <small class="text-muted">Kepala Keluarga</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-gender-male fs-2 text-info mb-2"></i>
                                    <h4 class="fw-bold text-info mb-1">{{ $data->jaga2_laki ?? 0 }}</h4>
                                    <small class="text-muted">Laki-laki</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-light border-0 text-center p-3">
                                    <i class="bi bi-gender-female fs-2 text-danger mb-2"></i>
                                    <h4 class="fw-bold text-danger mb-1">{{ $data->jaga2_perempuan ?? 0 }}</h4>
                                    <small class="text-muted">Perempuan</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Perbandingan Jaga -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Perbandingan Penduduk per Jaga</h5>
                        <div id="jagaComparisonChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== PENDIDIKAN & PEKERJAAN ====== -->
<section id="pendidikan" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Pendidikan & Pekerjaan</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Tingkat Pendidikan</h5>
                        <div id="educationChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Jenis Pekerjaan</h5>
                        <div id="jobChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== KONDISI PERUMAHAN & SANITASI ====== -->
<section id="perumahan-sanitasi" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Kondisi Perumahan & Sanitasi</h2>
        <p class="text-center text-muted mb-5">Data kelayakan hunian dan fasilitas sanitasi</p>

        <!-- Stats Cards -->
        <div class="row text-center mb-5">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-house-check-fill fs-1 text-success mb-3"></i>
                        <h4 class="fw-bold text-success mb-1">{{ $data->rumah_layak ?? 0 }}</h4>
                        <p class="text-muted mb-0 small">Rumah Layak Huni</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-house-x-fill fs-1 text-danger mb-3"></i>
                        <h4 class="fw-bold text-danger mb-1">{{ $data->rumah_tidak_layak ?? 0 }}</h4>
                        <p class="text-muted mb-0 small">Rumah Tidak Layak Huni</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-trash3-fill fs-1 text-info mb-3"></i>
                        <h4 class="fw-bold text-info mb-1">{{ $data->tpa_terorganisir ?? 0 }}</h4>
                        <p class="text-muted mb-0 small">TPA Terorganisir</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-exclamation-triangle-fill fs-1 text-warning mb-3"></i>
                        <h4 class="fw-bold text-warning mb-1">{{ $data->jamban_cemplung ?? 0 }}</h4>
                        <p class="text-muted mb-0 small">Jamban Cemplung</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Kelayakan Hunian</h5>
                        <div id="housingChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Fasilitas Sanitasi</h5>
                        <div id="sanitationChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== SUMBER AIR & UTILITAS ====== -->
<section id="sumber-air" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Sumber Air & Utilitas</h2>
        <p class="text-center text-muted mb-5">Data akses air bersih dan sumber air di desa</p>

        <div class="row justify-content-center">
            <!-- Stats Cards -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-droplet-fill fs-1 text-primary mb-3"></i>
                        <h4 class="fw-bold text-primary mb-1">{{ $data->rumah_sumur ?? 0 }}</h4>
                        <p class="text-muted mb-2 small">Rumah dengan Air Sumur</p>
                        @php
                            $totalRumah = ($data->rumah_layak ?? 0) + ($data->rumah_tidak_layak ?? 0);
                            $persenSumur = $totalRumah > 0 ? round(($data->rumah_sumur ?? 0) / $totalRumah * 100, 1) : 0;
                        @endphp
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $persenSumur }}%;" aria-valuenow="{{ $persenSumur }}" aria-valuemin="0" aria-valuemax="100">
                                <strong>{{ $persenSumur }}%</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-water fs-1 text-info mb-3"></i>
                        <h4 class="fw-bold text-info mb-1">{{ $data->rumah_pam ?? 0 }}</h4>
                        <p class="text-muted mb-2 small">Rumah dengan Air PAM</p>
                        @php
                            $persenPam = $totalRumah > 0 ? round(($data->rumah_pam ?? 0) / $totalRumah * 100, 1) : 0;
                        @endphp
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $persenPam }}%;" aria-valuenow="{{ $persenPam }}" aria-valuemin="0" aria-valuemax="100">
                                <strong>{{ $persenPam }}%</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-bank fs-1 text-success mb-3"></i>
                        <h4 class="fw-bold text-success mb-1">{{ $data->rumah_sumber_lain ?? 0 }}</h4>
                        <p class="text-muted mb-2 small">Sumber Air Lainnya</p>
                        @php
                            $persenLain = $totalRumah > 0 ? round(($data->rumah_sumber_lain ?? 0) / $totalRumah * 100, 1) : 0;
                        @endphp
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persenLain }}%;" aria-valuenow="{{ $persenLain }}" aria-valuemin="0" aria-valuemax="100">
                                <strong>{{ $persenLain }}%</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Sumber Air -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Distribusi Sumber Air Rumah Tangga</h5>
                        <div id="waterSourceChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== SARANA & PRASARANA ====== -->
<section id="sarana" class="py-5 bg-light" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Sarana & Prasarana</h2>
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-hospital fs-1 text-primary mb-3"></i>
                        <h4 class="fw-bold mb-1">{{ $data->posyandu ?? 0 }}</h4>
                        <p class="text-muted mb-0">Posyandu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-book fs-1 text-success mb-3"></i>
                        <h4 class="fw-bold mb-1">{{ $data->sekolah ?? 0 }}</h4>
                        <p class="text-muted mb-0">Sekolah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-house-heart fs-1 text-warning mb-3"></i>
                        <h4 class="fw-bold mb-1">{{ $data->tempat_ibadah ?? 0 }}</h4>
                        <p class="text-muted mb-0">Tempat Ibadah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <i class="bi bi-geo-alt fs-1 text-danger mb-3"></i>
                        <h4 class="fw-bold mb-1">{{ $data->kantor_desa ?? 0 }}</h4>
                        <p class="text-muted mb-0">Kantor Desa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== EKONOMI & PERTANIAN ====== -->
<section id="ekonomi" class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center mb-4 fw-semibold">Ekonomi & Pertanian</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Produksi Pertanian per Tahun</h5>
                        <div id="agricultureChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3 fw-semibold">Potensi UMKM & Pariwisata</h5>
                        <div id="umkmChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button id="backToTopBtn" class="btn btn-success rounded-circle shadow-lg" style="position: fixed; bottom: 40px; right: 40px; display: none; width:50px; height:50px; z-index:999;">
    <i class="bi bi-arrow-up"></i>
</button>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Starting to render charts...');

    // Data dari PHP
    const dataLaki = {{ $data->laki_laki ?? 0 }};
    const dataPerempuan = {{ $data->perempuan ?? 0 }};
    const dataUsia = [
        {{ $data->usia_0_14 ?? 0 }},
        {{ $data->usia_15_24 ?? 0 }},
        {{ $data->usia_25_39 ?? 0 }},
        {{ $data->usia_40_59 ?? 0 }},
        {{ $data->usia_60_keatas ?? 0 }}
    ];
    const dataPendidikan = [
        {{ $data->sd ?? 0 }},
        {{ $data->smp ?? 0 }},
        {{ $data->sma ?? 0 }},
        {{ $data->sarjana ?? 0 }}
    ];
    const dataPekerjaan = [
        {{ $data->petani ?? 0 }},
        {{ $data->wiraswasta ?? 0 }},
        {{ $data->pelajar ?? 0 }},
        {{ $data->pns ?? 0 }},
        {{ $data->lainnya ?? 0 }}
    ];

    // Cek apakah ApexCharts ada
    if (typeof ApexCharts === 'undefined') {
        console.error('ApexCharts library not loaded!');
        return;
    }

    // === GENDER CHART (PIE) ===
    try {
        const genderOptions = {
            chart: { 
                type: 'pie',
                height: 320
            },
            series: [dataLaki, dataPerempuan],
            labels: ['Laki-laki', 'Perempuan'],
            colors: ['#0d6efd', '#dc3545'],
            legend: { 
                position: 'bottom',
                fontSize: '13px'
            },
            title: { 
                text: 'Perbandingan Jenis Kelamin', 
                align: 'center',
                style: {
                    fontSize: '15px',
                    fontWeight: 600
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: { height: 280 },
                    legend: { position: 'bottom' }
                }
            }]
        };
        new ApexCharts(document.querySelector("#genderChart"), genderOptions).render();
        console.log('Gender chart rendered');
    } catch (error) {
        console.error('Error rendering gender chart:', error);
    }

    // === AGE CHART (BAR) ===
    try {
        const ageOptions = {
            chart: { 
                type: 'bar', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [{ 
                name: 'Jumlah', 
                data: dataUsia 
            }],
            xaxis: { 
                categories: ['0-14 thn', '15-24 thn', '25-39 thn', '40-59 thn', '60+ thn'],
                labels: {
                    style: { fontSize: '11px' }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return Math.floor(val);
                    }
                }
            },
            colors: ['#fd7e14'],
            title: { 
                text: 'Distribusi Usia Penduduk', 
                align: 'center',
                style: {
                    fontSize: '15px',
                    fontWeight: 600
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"]
                }
            }
        };
        new ApexCharts(document.querySelector("#ageChart"), ageOptions).render();
        console.log('Age chart rendered');
    } catch (error) {
        console.error('Error rendering age chart:', error);
    }

    // === GROWTH CHART (LINE) ===
    try {
        const tahun = ['2021', '2022', '2023', '2024', '2025'];
        const pertumbuhanPenduduk = [
            {{ $data->penduduk_2021 ?? 1200 }}, 
            {{ $data->penduduk_2022 ?? 1250 }}, 
            {{ $data->penduduk_2023 ?? 1300 }}, 
            {{ $data->penduduk_2024 ?? 1380 }}, 
            {{ $data->penduduk_2025 ?? 1450 }}
        ];

        const growthOptions = {
            chart: { 
                type: 'line', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [{ 
                name: 'Jumlah Penduduk', 
                data: pertumbuhanPenduduk 
            }],
            xaxis: { 
                categories: tahun,
                labels: {
                    style: { fontSize: '11px' }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return Math.floor(val);
                    }
                }
            },
            colors: ['#0dcaf0'],
            title: { 
                text: 'Pertumbuhan Penduduk Tahunan', 
                align: 'center',
                style: {
                    fontSize: '15px',
                    fontWeight: 600
                }
            },
            stroke: { 
                curve: 'smooth', 
                width: 3 
            },
            markers: { 
                size: 5,
                hover: {
                    size: 7
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '10px'
                }
            }
        };
        new ApexCharts(document.querySelector("#growthChart"), growthOptions).render();
        console.log('Growth chart rendered');
    } catch (error) {
        console.error('Error rendering growth chart:', error);
    }

    // === JAGA COMPARISON CHART (BAR) ===
    try {
        const jagaOptions = {
            chart: { 
                type: 'bar', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [
                { 
                    name: 'Jaga 1', 
                    data: [{{ $data->jaga1_penduduk ?? 0 }}, {{ $data->jaga1_kk ?? 0 }}] 
                },
                { 
                    name: 'Jaga 2', 
                    data: [{{ $data->jaga2_penduduk ?? 0 }}, {{ $data->jaga2_kk ?? 0 }}] 
                }
            ],
            xaxis: { 
                categories: ['Total Penduduk', 'Kepala Keluarga']
            },
            colors: ['#0d6efd', '#198754'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"]
                }
            },
            legend: {
                position: 'bottom'
            }
        };
        new ApexCharts(document.querySelector("#jagaComparisonChart"), jagaOptions).render();
        console.log('Jaga comparison chart rendered');
    } catch (error) {
        console.error('Error rendering jaga comparison chart:', error);
    }

    // === EDUCATION CHART (BAR) ===
    try {
        const educationOptions = {
            chart: { 
                type: 'bar', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [{ 
                name: 'Jumlah', 
                data: dataPendidikan 
            }],
            xaxis: { 
                categories: ['SD', 'SMP', 'SMA', 'Sarjana']
            },
            colors: ['#6610f2'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"]
                }
            }
        };
        new ApexCharts(document.querySelector("#educationChart"), educationOptions).render();
        console.log('Education chart rendered');
    } catch (error) {
        console.error('Error rendering education chart:', error);
    }

    // === JOB CHART (BAR) ===
    try {
        const jobOptions = {
            chart: { 
                type: 'bar', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [{ 
                name: 'Jumlah', 
                data: dataPekerjaan 
            }],
            xaxis: { 
                categories: ['Petani', 'Wiraswasta', 'Pelajar', 'PNS', 'Lainnya'],
                labels: {
                    style: { fontSize: '10px' }
                }
            },
            colors: ['#198754'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"]
                }
            }
        };
        new ApexCharts(document.querySelector("#jobChart"), jobOptions).render();
        console.log('Job chart rendered');
    } catch (error) {
        console.error('Error rendering job chart:', error);
    }

    // === HOUSING CHART (PIE) ===
    try {
        const housingOptions = {
            chart: { 
                type: 'pie',
                height: 320
            },
            series: [
                {{ $data->rumah_layak ?? 0 }}, 
                {{ $data->rumah_tidak_layak ?? 0 }}
            ],
            labels: ['Rumah Layak Huni', 'Rumah Tidak Layak Huni'],
            colors: ['#198754', '#dc3545'],
            legend: { 
                position: 'bottom',
                fontSize: '13px'
            },
            dataLabels: {
                enabled: true,
                formatter: function(val, opts) {
                    return opts.w.config.series[opts.seriesIndex] + " unit"
                }
            }
        };
        new ApexCharts(document.querySelector("#housingChart"), housingOptions).render();
        console.log('Housing chart rendered');
    } catch (error) {
        console.error('Error rendering housing chart:', error);
    }

    // === SANITATION CHART (DONUT) ===
    try {
        const sanitationOptions = {
            chart: { 
                type: 'donut',
                height: 320
            },
            series: [
                {{ $data->tpa_terorganisir ?? 0 }}, 
                {{ $data->jamban_cemplung ?? 0 }}
            ],
            labels: ['TPA Terorganisir (Septic Tank)', 'Jamban Cemplung'],
            colors: ['#0dcaf0', '#ffc107'],
            legend: { 
                position: 'bottom',
                fontSize: '13px'
            },
            dataLabels: {
                enabled: true,
                formatter: function(val, opts) {
                    return opts.w.config.series[opts.seriesIndex] + " unit"
                }
            }
        };
        new ApexCharts(document.querySelector("#sanitationChart"), sanitationOptions).render();
        console.log('Sanitation chart rendered');
    } catch (error) {
        console.error('Error rendering sanitation chart:', error);
    }

    // === WATER SOURCE CHART (BAR) ===
    try {
        const waterSourceOptions = {
            chart: { 
                type: 'bar', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [{ 
                name: 'Jumlah Rumah', 
                data: [
                    {{ $data->rumah_sumur ?? 0 }}, 
                    {{ $data->rumah_pam ?? 0 }}, 
                    {{ $data->rumah_sumber_lain ?? 0 }}
                ]
            }],
            xaxis: { 
                categories: ['Sumur', 'PAM', 'Sumber Lainnya']
            },
            colors: ['#0d6efd'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"]
                },
                formatter: function(val) {
                    return val + " rumah"
                }
            }
        };
        new ApexCharts(document.querySelector("#waterSourceChart"), waterSourceOptions).render();
        console.log('Water source chart rendered');
    } catch (error) {
        console.error('Error rendering water source chart:', error);
    }

    // === AGRICULTURE CHART (BAR) ===
    try {
        const agricultureOptions = {
            chart: { 
                type: 'bar', 
                height: 320,
                toolbar: { show: false } 
            },
            series: [{ 
                name: 'Produksi (Ton)', 
                data: [
                    {{ $data->padi ?? 120 }}, 
                    {{ $data->jagung ?? 80 }}, 
                    {{ $data->sayuran ?? 150 }}, 
                    {{ $data->buah ?? 90 }}
                ]
            }],
            xaxis: { 
                categories: ['Padi', 'Jagung', 'Sayuran', 'Buah-buahan']
            },
            colors: ['#20c997'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    dataLabels: {
                        position: 'top'
                    }
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '11px',
                    colors: ["#304758"]
                }
            }
        };
        new ApexCharts(document.querySelector("#agricultureChart"), agricultureOptions).render();
        console.log('Agriculture chart rendered');
    } catch (error) {
        console.error('Error rendering agriculture chart:', error);
    }

    // === UMKM CHART (DONUT) ===
    try {
        const umkmOptions = {
            chart: { 
                type: 'donut',
                height: 320
            },
            series: [
                {{ $data->umkm_kuliner ?? 15 }}, 
                {{ $data->umkm_kerajinan ?? 8 }}, 
                {{ $data->wisata ?? 5 }}, 
                {{ $data->umkm_lainnya ?? 12 }}
            ],
            labels: ['Kuliner', 'Kerajinan', 'Wisata', 'Lainnya'],
            colors: ['#ffc107', '#e83e8c', '#6f42c1', '#17a2b8'],
            legend: { 
                position: 'bottom',
                fontSize: '13px'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: { height: 280 },
                    legend: { position: 'bottom' }
                }
            }]
        };
        new ApexCharts(document.querySelector("#umkmChart"), umkmOptions).render();
        console.log('UMKM chart rendered');
    } catch (error) {
        console.error('Error rendering UMKM chart:', error);
    }

    console.log('All charts rendering completed!');
});

// Back to Top Button
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
@endpush