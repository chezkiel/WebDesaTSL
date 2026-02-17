@extends('admin.layouts.app')

@section('title', 'Kelola Pengguna Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="page-title">
        <i class="bi bi-people-fill me-2"></i>
        Kelola Pengguna Admin
    </h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus-fill me-1"></i>
        Tambah Admin Baru
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Bergabung Sejak</th>
                        <th style="width: 100px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <strong>{{ $user->name }}</strong>
                            
                            <!-- Tambahkan Badge/Label Status -->
                            @if($user->id == 1)
                                <span class="badge bg-danger small ms-1">Super Admin</span>
                            @elseif($user->id == Auth::id())
                                <span class="badge bg-success small ms-1">Anda</span>
                            @endif
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td class="text-center">

                            @if($user->id != 1 && $user->id != Auth::id())
                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal"
                                        data-bs-action="{{ route('admin.users.destroy', $user->id) }}"
                                        data-bs-name="{{ $user->name }}"
                                        title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            @else
                                <span classV="text-muted" title="Akun ini tidak dapat dihapus">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="bi bi-person-x fs-1 text-muted"></i>
                            <p class="text-muted mt-3 mb-0">Belum ada pengguna admin.</p>
                            <small class="text-muted">Klik "Tambah Admin Baru" untuk memulai.</small>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Link Paginasi -->
        @if($users->hasPages())
        <div class="mt-4">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus admin: <strong id="deleteUserName"></strong>?
                <br><br>
                <span class="text-danger">Tindakan ini tidak dapat dibatalkan.</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus Pengguna</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            
            const actionUrl = button.getAttribute('data-bs-action');
            const userName = button.getAttribute('data-bs-name');
            
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.setAttribute('action', actionUrl);
                        const deleteUserName = document.getElementById('deleteUserName');
            deleteUserName.textContent = userName;
        });
    }
</script>
@endpush