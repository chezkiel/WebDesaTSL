@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="page-title">
        <i class="bi bi-newspaper me-2"></i>
        Kelola Berita
    </h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        Tambah Berita Baru
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($berita->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 100px;">Gambar</th>
                        <th>Judul</th>
                        <th style="width: 150px;">Kategori</th>
                        <th style="width: 120px;">Tanggal</th>
                        <th style="width: 120px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($berita as $index => $item)
                    <tr>
                        <td>{{ $berita->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ asset('images/berita/' . $item->gambar) }}" alt="Gambar {{ $item->judul }}" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                        </td>
                        <td>
                            <strong class="d-block">{{ Str::limit($item->judul, 70) }}</strong>
                            <small class="text-muted">Slug: {{ $item->slug }}</small>
                        </td>
                        <td>
                            @if($item->kategori)
                            <span class="badge bg-secondary">{{ $item->kategori }}</span>
                            @else
                            <span class="text-muted small">-</span>
                            @endif
                        </td>
                        <td>
                            <small>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>
                        </td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil-fill"></i>
                            </a>

                            <!-- Tombol Hapus (Membuka Modal) -->
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-action="{{ route('admin.berita.destroy', $item->id) }}" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="bi bi-inbox fs-1 text-muted"></i>
                            <p class="text-muted mt-3">Belum ada berita.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $berita->links() }}
        </div>

        @else
        <div class="text-center py-5">
            <i class="bi bi-inbox fs-1 text-muted"></i>
            <p class="text-muted mt-3">Belum ada berita.</p>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Berita Pertama
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Script untuk mengirimkan URL action form delete ke modal
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        // Tombol yang memicu modal
        const button = event.relatedTarget;
        // Ambil URL dari atribut data-bs-action
        const actionUrl = button.getAttribute('data-bs-action');
        // Set action form di dalam modal
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.setAttribute('action', actionUrl);
    });
</script>
@endpush