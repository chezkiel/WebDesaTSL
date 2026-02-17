@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<h2 class="page-title">
    <i class="bi bi-pencil-square me-2"></i>
    Edit Berita
</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Metode PUT untuk update -->

            <div class="row">
                <!-- Kolom Kiri: Konten Utama -->
                <div class="col-md-8">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                        @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug (Readonly, diisi otomatis oleh JS) -->
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (URL) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $berita->slug) }}" readonly required>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konten (TinyMCE) -->
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten Berita <span class="text-danger">*</span></label>
                        <textarea id="konten" name="konten" class="form-control @error('konten') is-invalid @enderror" rows="15">
                        {{ old('konten', $berita->konten) }}
                        </textarea>
                        @error('konten')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Kolom Kanan: Atribut Tambahan -->
                <div class="col-md-4">
                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Ganti Gambar Utama</label>

                        <!-- Preview Gambar yang Ada -->
                        @php
                        $gambarSrc = $berita->gambar ? asset('images/berita/' . $berita->gambar) : asset('images/no-image.png');
                        @endphp

                        <img id="gambar-preview" src="{{ $gambarSrc }}" alt="Preview Gambar" class="img-thumbnail mb-2" style="width: 100%; height: 200px; object-fit: cover;">

                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" onchange="previewImage()">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar. Ukuran maks: 2MB.</small>
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori', $berita->kategori) }}" list="kategori-list" placeholder="Mis: Pemerintahan">
                        <!-- Datalist untuk sugesti kategori -->
                        <datalist id="kategori-list">
                            <option value="Pemerintahan">
                            <option value="Sosial">
                            <option value="Budaya">
                            <option value="Ekonomi">
                            <option value="Pembangunan">
                        </datalist>
                        @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $berita->tanggal ? \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d') : now()->format('Y-m-d')) }}">
                        @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-4 border-top pt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Update Berita
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#konten'), {
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'heading',
                    '|', 'bold', 'italic', 'link',
                    '|', 'bulletedList', 'numberedList',
                    '|', 'blockQuote', 'insertTable', 'mediaEmbed',
                    '|', 'code'
                ]
            },
            mediaEmbed: {
                // Izinkan embed video dari YouTube, dll.
                previewsInData: true
            }
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });
</script>

<!-- Auto-Slug & Image Preview Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // 1. Auto-Slug Generator
        const judulInput = document.getElementById('judul');
        const slugInput = document.getElementById('slug');

        if (judulInput) {
            judulInput.addEventListener('keyup', function() {
                let judul = this.value;
                let slug = judul.toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter spesial
                    .replace(/[\s-]+/g, '-'); // Ganti spasi dengan 1 strip
                slugInput.value = slug;
            });
        }

        // 2. Image Preview
        window.previewImage = function() {
            const fileInput = document.getElementById('gambar');
            const preview = document.getElementById('gambar-preview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    });
</script>
@endpush