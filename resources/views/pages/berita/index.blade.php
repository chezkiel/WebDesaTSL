@extends('layouts.app')

@section('title', 'Berita Desa Tempok Selatan')

@section('content')

<!-- Header Section -->
<section class="py-5 bg-light" data-aos="fade-up">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Berita & Pengumuman Desa</h1>
        <p class="text-muted fs-5">
            Informasi terkini seputar kegiatan dan perkembangan Desa Tempok Selatan
        </p>
    </div>
</section>

<!-- Berita List Section -->
<section class="py-5">
    <div class="container">
        @if($berita->count() > 0)
            <div class="row">
                @foreach($berita as $item)
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            @if($item->gambar)
                                <img src="{{ asset('images/berita/' . $item->gambar) }}" 
                                     class="card-img-top" 
                                     alt="{{ $item->judul }}" 
                                     style="height: 220px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-gradient d-flex align-items-center justify-content-center" 
                                     style="height: 220px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <i class="bi bi-newspaper fs-1 text-white"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <div class="mb-2">
                                    <span class="badge bg-primary">
                                        <i class="bi bi-calendar3"></i> 
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                                
                                <h5 class="card-title fw-bold mb-3">{{ $item->judul }}</h5>
                                
                                <p class="card-text text-muted flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi), 120, '...') }}
                                </p>
                                
                                <div class="mt-3">
                                    <a href="{{ route('berita.show', $item->slug) }}" 
                                       class="btn btn-outline-primary btn-sm w-100">
                                        Baca Selengkapnya 
                                        <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5" data-aos="fade-up">
                <div class="mb-4">
                    <i class="bi bi-inbox fs-1 text-muted" style="font-size: 5rem;"></i>
                </div>
                <h4 class="text-muted fw-semibold mb-2">Belum Ada Berita</h4>
                <p class="text-muted">Berita dan informasi terbaru akan segera hadir</p>
            </div>
        @endif
    </div>
</section>

@endsection