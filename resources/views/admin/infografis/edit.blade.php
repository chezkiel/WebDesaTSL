@extends('admin.layouts.app')

@section('title', 'Edit Data Infografis')

@push('styles')
<style>
    .nav-tabs .nav-link {
        color: #6c757d;
        border: none;
        border-bottom: 3px solid transparent;
        font-weight: 500;
    }
    
    .nav-tabs .nav-link:hover {
        color: #dc3545;
        border-bottom-color: #dc3545;
    }
    
    .nav-tabs .nav-link.active {
        color: #dc3545;
        background: none;
        border-bottom-color: #dc3545;
    }
    
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }
    
    .form-control:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
    }
    
    .section-title {
        color: #dc3545;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #dc3545;
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title mb-0">
        <i class="bi bi-bar-chart-fill me-2"></i>
        Edit Data Infografis
    </h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('admin.infografis.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs mb-4" id="infografisTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="penduduk-tab" data-bs-toggle="tab" data-bs-target="#penduduk" type="button">
                        <i class="bi bi-people-fill me-1"></i> Penduduk
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jaga-tab" data-bs-toggle="tab" data-bs-target="#jaga" type="button">
                        <i class="bi bi-geo-alt-fill me-1"></i> Per Jaga
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="demografi-tab" data-bs-toggle="tab" data-bs-target="#demografi" type="button">
                        <i class="bi bi-bar-chart-line me-1"></i> Demografi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="perumahan-tab" data-bs-toggle="tab" data-bs-target="#perumahan" type="button">
                        <i class="bi bi-house-fill me-1"></i> Perumahan
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="fasilitas-tab" data-bs-toggle="tab" data-bs-target="#fasilitas" type="button">
                        <i class="bi bi-building me-1"></i> Fasilitas
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ekonomi-tab" data-bs-toggle="tab" data-bs-target="#ekonomi" type="button">
                        <i class="bi bi-graph-up me-1"></i> Ekonomi
                    </button>
                </li>
            </ul>
            
            <!-- Tabs Content -->
            <div class="tab-content" id="infografisTabsContent">
                
                <!-- TAB 1: PENDUDUK UMUM -->
                <div class="tab-pane fade show active" id="penduduk" role="tabpanel">
                    <h5 class="section-title">Statistik Penduduk Umum</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="total_penduduk" class="form-label">Total Penduduk</label>
                            <input type="number" class="form-control" id="total_penduduk" name="total_penduduk" value="{{ old('total_penduduk', $data->total_penduduk) }}" required min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_keluarga" class="form-label">Jumlah Kepala Keluarga</label>
                            <input type="number" class="form-control" id="jumlah_keluarga" name="jumlah_keluarga" value="{{ old('jumlah_keluarga', $data->jumlah_keluarga) }}" required min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="laki_laki" class="form-label">Laki-laki</label>
                            <input type="number" class="form-control" id="laki_laki" name="laki_laki" value="{{ old('laki_laki', $data->laki_laki) }}" required min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="perempuan" class="form-label">Perempuan</label>
                            <input type="number" class="form-control" id="perempuan" name="perempuan" value="{{ old('perempuan', $data->perempuan) }}" required min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Pertumbuhan Penduduk Tahunan</h5>
                    <div class="row">
                        <div class="col-md-4 col-lg-2 mb-3">
                            <label for="penduduk_2021" class="form-label">Tahun 2021</label>
                            <input type="number" class="form-control" id="penduduk_2021" name="penduduk_2021" value="{{ old('penduduk_2021', $data->penduduk_2021) }}" min="0">
                        </div>
                        <div class="col-md-4 col-lg-2 mb-3">
                            <label for="penduduk_2022" class="form-label">Tahun 2022</label>
                            <input type="number" class="form-control" id="penduduk_2022" name="penduduk_2022" value="{{ old('penduduk_2022', $data->penduduk_2022) }}" min="0">
                        </div>
                        <div class="col-md-4 col-lg-2 mb-3">
                            <label for="penduduk_2023" class="form-label">Tahun 2023</label>
                            <input type="number" class="form-control" id="penduduk_2023" name="penduduk_2023" value="{{ old('penduduk_2023', $data->penduduk_2023) }}" min="0">
                        </div>
                        <div class="col-md-4 col-lg-2 mb-3">
                            <label for="penduduk_2024" class="form-label">Tahun 2024</label>
                            <input type="number" class="form-control" id="penduduk_2024" name="penduduk_2024" value="{{ old('penduduk_2024', $data->penduduk_2024) }}" min="0">
                        </div>
                        <div class="col-md-4 col-lg-2 mb-3">
                            <label for="penduduk_2025" class="form-label">Tahun 2025</label>
                            <input type="number" class="form-control" id="penduduk_2025" name="penduduk_2025" value="{{ old('penduduk_2025', $data->penduduk_2025) }}" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- TAB 2: DATA PER JAGA -->
                <div class="tab-pane fade" id="jaga" role="tabpanel">
                    <h5 class="section-title">Data Jaga 1</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jaga1_penduduk" class="form-label">Total Penduduk Jaga 1</label>
                            <input type="number" class="form-control" id="jaga1_penduduk" name="jaga1_penduduk" value="{{ old('jaga1_penduduk', $data->jaga1_penduduk) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jaga1_kk" class="form-label">Kepala Keluarga Jaga 1</label>
                            <input type="number" class="form-control" id="jaga1_kk" name="jaga1_kk" value="{{ old('jaga1_kk', $data->jaga1_kk) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jaga1_laki" class="form-label">Laki-laki Jaga 1</label>
                            <input type="number" class="form-control" id="jaga1_laki" name="jaga1_laki" value="{{ old('jaga1_laki', $data->jaga1_laki) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jaga1_perempuan" class="form-label">Perempuan Jaga 1</label>
                            <input type="number" class="form-control" id="jaga1_perempuan" name="jaga1_perempuan" value="{{ old('jaga1_perempuan', $data->jaga1_perempuan) }}" min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Data Jaga 2</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jaga2_penduduk" class="form-label">Total Penduduk Jaga 2</label>
                            <input type="number" class="form-control" id="jaga2_penduduk" name="jaga2_penduduk" value="{{ old('jaga2_penduduk', $data->jaga2_penduduk) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jaga2_kk" class="form-label">Kepala Keluarga Jaga 2</label>
                            <input type="number" class="form-control" id="jaga2_kk" name="jaga2_kk" value="{{ old('jaga2_kk', $data->jaga2_kk) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jaga2_laki" class="form-label">Laki-laki Jaga 2</label>
                            <input type="number" class="form-control" id="jaga2_laki" name="jaga2_laki" value="{{ old('jaga2_laki', $data->jaga2_laki) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jaga2_perempuan" class="form-label">Perempuan Jaga 2</label>
                            <input type="number" class="form-control" id="jaga2_perempuan" name="jaga2_perempuan" value="{{ old('jaga2_perempuan', $data->jaga2_perempuan) }}" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- TAB 3: DEMOGRAFI (Usia, Pendidikan, Pekerjaan) -->
                <div class="tab-pane fade" id="demografi" role="tabpanel">
                    <h5 class="section-title">Distribusi Usia</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="usia_0_14" class="form-label">Usia 0-14 Tahun</label>
                            <input type="number" class="form-control" id="usia_0_14" name="usia_0_14" value="{{ old('usia_0_14', $data->usia_0_14) }}" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="usia_15_24" class="form-label">Usia 15-24 Tahun</label>
                            <input type="number" class="form-control" id="usia_15_24" name="usia_15_24" value="{{ old('usia_15_24', $data->usia_15_24) }}" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="usia_25_39" class="form-label">Usia 25-39 Tahun</label>
                            <input type="number" class="form-control" id="usia_25_39" name="usia_25_39" value="{{ old('usia_25_39', $data->usia_25_39) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usia_40_59" class="form-label">Usia 40-59 Tahun</label>
                            <input type="number" class="form-control" id="usia_40_59" name="usia_40_59" value="{{ old('usia_40_59', $data->usia_40_59) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usia_60_keatas" class="form-label">Usia 60+ Tahun</label>
                            <input type="number" class="form-control" id="usia_60_keatas" name="usia_60_keatas" value="{{ old('usia_60_keatas', $data->usia_60_keatas) }}" min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Tingkat Pendidikan</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sd" class="form-label">SD/Sederajat</label>
                            <input type="number" class="form-control" id="sd" name="sd" value="{{ old('sd', $data->sd) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="smp" class="form-label">SMP/Sederajat</label>
                            <input type="number" class="form-control" id="smp" name="smp" value="{{ old('smp', $data->smp) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sma" class="form-label">SMA/Sederajat</label>
                            <input type="number" class="form-control" id="sma" name="sma" value="{{ old('sma', $data->sma) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sarjana" class="form-label">Sarjana/Diploma</label>
                            <input type="number" class="form-control" id="sarjana" name="sarjana" value="{{ old('sarjana', $data->sarjana) }}" min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Jenis Pekerjaan</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="petani" class="form-label">Petani</label>
                            <input type="number" class="form-control" id="petani" name="petani" value="{{ old('petani', $data->petani) }}" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="wiraswasta" class="form-label">Wiraswasta</label>
                            <input type="number" class="form-control" id="wiraswasta" name="wiraswasta" value="{{ old('wiraswasta', $data->wiraswasta) }}" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="pelajar" class="form-label">Pelajar/Mahasiswa</label>
                            <input type="number" class="form-control" id="pelajar" name="pelajar" value="{{ old('pelajar', $data->pelajar) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pns" class="form-label">PNS/TNI/Polri</label>
                            <input type="number" class="form-control" id="pns" name="pns" value="{{ old('pns', $data->pns) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lainnya" class="form-label">Lainnya</label>
                            <input type="number" class="form-control" id="lainnya" name="lainnya" value="{{ old('lainnya', $data->lainnya) }}" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- TAB 4: PERUMAHAN & SANITASI -->
                <div class="tab-pane fade" id="perumahan" role="tabpanel">
                    <h5 class="section-title">Kondisi Perumahan</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="rumah_layak" class="form-label">Rumah Layak Huni</label>
                            <input type="number" class="form-control" id="rumah_layak" name="rumah_layak" value="{{ old('rumah_layak', $data->rumah_layak) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rumah_tidak_layak" class="form-label">Rumah Tidak Layak Huni</label>
                            <input type="number" class="form-control" id="rumah_tidak_layak" name="rumah_tidak_layak" value="{{ old('rumah_tidak_layak', $data->rumah_tidak_layak) }}" min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Fasilitas Sanitasi</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tpa_terorganisir" class="form-label">TPA Terorganisir (Septic Tank)</label>
                            <input type="number" class="form-control" id="tpa_terorganisir" name="tpa_terorganisir" value="{{ old('tpa_terorganisir', $data->tpa_terorganisir) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jamban_cemplung" class="form-label">Jamban Cemplung</label>
                            <input type="number" class="form-control" id="jamban_cemplung" name="jamban_cemplung" value="{{ old('jamban_cemplung', $data->jamban_cemplung) }}" min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Sumber Air</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="rumah_sumur" class="form-label">Rumah dengan Air Sumur</label>
                            <input type="number" class="form-control" id="rumah_sumur" name="rumah_sumur" value="{{ old('rumah_sumur', $data->rumah_sumur) }}" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rumah_pam" class="form-label">Rumah dengan Air PAM</label>
                            <input type="number" class="form-control" id="rumah_pam" name="rumah_pam" value="{{ old('rumah_pam', $data->rumah_pam) }}" min="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="rumah_sumber_lain" class="form-label">Sumber Air Lainnya</label>
                            <input type="number" class="form-control" id="rumah_sumber_lain" name="rumah_sumber_lain" value="{{ old('rumah_sumber_lain', $data->rumah_sumber_lain) }}" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- TAB 5: FASILITAS UMUM -->
                <div class="tab-pane fade" id="fasilitas" role="tabpanel">
                    <h5 class="section-title">Sarana & Prasarana Desa</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="posyandu" class="form-label">Jumlah Posyandu</label>
                            <input type="number" class="form-control" id="posyandu" name="posyandu" value="{{ old('posyandu', $data->posyandu) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sekolah" class="form-label">Jumlah Sekolah</label>
                            <input type="number" class="form-control" id="sekolah" name="sekolah" value="{{ old('sekolah', $data->sekolah) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_ibadah" class="form-label">Jumlah Tempat Ibadah</label>
                            <input type="number" class="form-control" id="tempat_ibadah" name="tempat_ibadah" value="{{ old('tempat_ibadah', $data->tempat_ibadah) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kantor_desa" class="form-label">Jumlah Kantor Desa</label>
                            <input type="number" class="form-control" id="kantor_desa" name="kantor_desa" value="{{ old('kantor_desa', $data->kantor_desa) }}" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- TAB 6: EKONOMI & PERTANIAN -->
                <div class="tab-pane fade" id="ekonomi" role="tabpanel">
                    <h5 class="section-title">Produksi Pertanian (Ton/Tahun)</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="padi" class="form-label">Padi</label>
                            <input type="number" class="form-control" id="padi" name="padi" value="{{ old('padi', $data->padi) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jagung" class="form-label">Jagung</label>
                            <input type="number" class="form-control" id="jagung" name="jagung" value="{{ old('jagung', $data->jagung) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sayuran" class="form-label">Sayuran</label>
                            <input type="number" class="form-control" id="sayuran" name="sayuran" value="{{ old('sayuran', $data->sayuran) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="buah" class="form-label">Buah-buahan</label>
                            <input type="number" class="form-control" id="buah" name="buah" value="{{ old('buah', $data->buah) }}" min="0">
                        </div>
                    </div>
                    
                    <h5 class="section-title mt-4">Potensi UMKM & Pariwisata</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="umkm_kuliner" class="form-label">UMKM Kuliner</label>
                            <input type="number" class="form-control" id="umkm_kuliner" name="umkm_kuliner" value="{{ old('umkm_kuliner', $data->umkm_kuliner) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="umkm_kerajinan" class="form-label">UMKM Kerajinan</label>
                            <input type="number" class="form-control" id="umkm_kerajinan" name="umkm_kerajinan" value="{{ old('umkm_kerajinan', $data->umkm_kerajinan) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="wisata" class="form-label">Objek Wisata</label>
                            <input type="number" class="form-control" id="wisata" name="wisata" value="{{ old('wisata', $data->wisata) }}" min="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="umkm_lainnya" class="form-label">UMKM Lainnya</label>
                            <input type="number" class="form-control" id="umkm_lainnya" name="umkm_lainnya" value="{{ old('umkm_lainnya', $data->umkm_lainnya) }}" min="0">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-4 pt-3 border-top d-flex justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection