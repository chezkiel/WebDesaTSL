@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h2 class="page-title">
    <i class="bi bi-speedometer2 me-2"></i>
    Dashboard
</h2>

<!-- ===== KARTU STATISTIK (FOKUS PADA PEMANTAUAN) ===== -->
<div class="row">
    <!-- 1. Total Berita (Kuantitas Konten) -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #dc3545 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small mb-1">Total Berita</div>
                        <h3 class="mb-0 fw-bold">{{ $stats['total_berita'] }}</h3>
                    </div>
                    <div class="text-danger" style="font-size: 40px;">
                        <i class="bi bi-newspaper"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.berita.index') }}" class="text-danger text-decoration-none small">
                        Kelola Berita <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Total Admin (Keamanan Sistem) -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #6f42c1 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small mb-1">Total Admin</div>
                        <h3 class="mb-0 fw-bold">{{ $stats['total_admin'] }}</h3>
                    </div>
                    <div class="text-purple" style="font-size: 40px; color: #6f42c1;">
                        <i class="bi bi-person-shield"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-muted small">Status Keamanan Sistem</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Data Infografis Diperbarui (Kesegaran Data) -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #198754 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small mb-1">Data Diperbarui</div>
                        <h3 class="mb-0 fw-bold">
                            @if($infografis)
                                {{ $infografis->updated_at->diffForHumans() }}
                            @else
                                <span class="text-danger small">Belum Diisi</span>
                            @endif
                        </h3>
                    </div>
                    <div class="text-success" style="font-size: 40px;">
                        <i class="bi bi-bar-chart-line-fill"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.infografis.edit') }}" class="text-success text-decoration-none small">
                        Edit Data Infografis <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Berita Terakhir Diterbitkan (Kesegaran Konten) -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-left: 4px solid #ffc107 !important;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small mb-1">Berita Terakhir</div>
                        <h3 class="mb-0 fw-bold">
                            @if($beritaTerbaru->count() > 0)
                                {{ $beritaTerbaru->first()->created_at->diffForHumans() }}
                            @else
                                <span class="text-danger small">Belum Ada</span>
                            @endif
                        </h3>
                    </div>
                    <div class="text-warning" style="font-size: 40px;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-muted small">Status aktivitas konten</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row untuk Berita Terbaru & Panel Kontrol -->
<div class="row">
    <!-- Berita Terbaru (Feed Aktivitas Utama) -->
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-newspaper me-2"></i>
                    Aktivitas Berita Terbaru
                </h5>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-lg"></i> Tambah Berita
                </a>
            </div>
            <div class="card-body p-0">
                @if($beritaTerbaru->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Judul</th>
                                <th style="width: 120px;">Tanggal</th>
                                <th style="width: 100px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beritaTerbaru as $index => $berita)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ Str::limit($berita->judul, 60) }}</strong>
                                    @if($berita->kategori)
                                    <br><span class="badge bg-secondary small">{{ $berita->kategori }}</span>
                                    @endif
                                </td>
                                <td>
                                    <small>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</small>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light text-center">
                    <a href="{{ route('admin.berita.index') }}" class="text-decoration-none">
                        Lihat Semua Berita <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                @else
                <div class="text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted"></i>
                    <p class="text-muted mt-3">Belum ada berita</p>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Berita Pertama
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card border-danger shadow-sm">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">
                    <i class="bi bi-speedometer me-2"></i>
                    Panel Kontrol
                </h5>
            </div>
            <div class="card-body">
                <p class="mb-3"><strong>Selamat datang, {{ Auth::user()->name }}!</strong></p>
                
                <!-- Quick Actions -->
                <div class="d-grid gap-2 mb-3">
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-danger">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Berita Baru
                    </a>
                    <a href="{{ route('admin.infografis.edit') }}" class="btn btn-outline-danger">
                        <i class="bi bi-bar-chart-fill me-2"></i>
                        Edit Data Infografis
                    </a>
                    <a href="{{ route('beranda') }}" target="_blank" class="btn btn-outline-secondary">
                        <i class="bi bi-eye me-2"></i>
                        Lihat Website
                    </a>
                </div>

                <hr class="my-3">

                <!-- Info Status Sistem -->
                <div class="small">
                    <h6 class="fw-bold text-muted mb-2">Status Sistem</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Username Anda:</span>
                        <span class="fw-semibold">{{ Auth::user()->username }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Total Admin:</span>
                        <span class="fw-semibold">{{ $stats['total_admin'] }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Data Infografis:</span>
                        @if($infografis)
                            <span class="fw-semibold text-success">
                                <i class="bi bi-check-circle-fill"></i> Terisi
                            </span>
                        @else
                            <span class="fw-semibold text-danger">
                                <i class="bi bi-exclamation-triangle-fill"></i> Kosong
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

