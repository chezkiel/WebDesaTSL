@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<section class="py-5" data-aos="fade-up">
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('berita.index') }}" class="text-decoration-none text-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Berita
            </a>
        </div>

        <div class="text-center mb-4">
            <h1 class="fw-bold">{{ $berita->judul }}</h1>
            <p class="text-muted">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}</p>
        </div>

        @if($berita->gambar)
            <img src="{{ asset('images/berita/' . $berita->gambar) }}" 
                 alt="{{ $berita->judul }}" 
                 class="img-fluid rounded mb-4 w-100" 
                 style="max-height: 400px; object-fit: cover;">
        @endif

        <div class="content">
            {!! $berita->konten !!}
        </div>
    </div>
</section>
@endsection