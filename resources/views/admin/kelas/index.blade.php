@extends('layout.layout')

@section('title', 'Kelas - Smartoe')

@section('content')
<div class="title text-dark font-weight-bold px-1 rounded-top mt-5 pl-3">List Kelas</div>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Kelas</button>
<form action="{{ route('kelas.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari berdasarkan Kode Kelas atau Nama Kelas">
    </form>
    <div class="card shadow mb-2">
        <div class="card-body border-bottom">
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $kelas)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Nomor urut otomatis -->
                        <td>{{ $kelas->kode_kelas }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td> <button class="btn btn-warning btn-sm edit-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            data-kode_kelas="{{ $kelas->kode_kelas }}"
                            data-nama_kelas="{{ $kelas->nama_kelas }}">
                            Edit
                        </button>
                        <form action="{{ route('kelas.hapus', $kelas->kode_kelas) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus Kelas {{$kelas->kode_kelas}}?')">Hapus</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Kelas</label>
                        <input type="text" name="kode_kelas" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Kelas</label>
                        <input type="text" name="kode_kelas" id="edit-kode_kelas" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="edit-nama_kelas" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script Modal Edit -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            let kode_kelas = this.dataset.kode_kelas;
            let nama_kelas = this.dataset.nama_kelas;

            document.getElementById('edit-kode_kelas').value = kode_kelas;
            document.getElementById('edit-nama_kelas').value = nama_kelas;

            document.getElementById('editForm').action = `./kelas/update/${kode_kelas}`;
        });
    });
});
</script>
@endsection