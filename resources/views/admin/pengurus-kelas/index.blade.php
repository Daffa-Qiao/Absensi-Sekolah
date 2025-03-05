@extends('layout.layout')

@section('title', 'Pengurus Kelas - Smartoe')

@section('content')
<div class="title text-dark font-weight-bold px-1 rounded-top mt-5 pl-3">List Jabatan Pengurus Kelas</div>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Kelas</button>
<div>
    <div class="card shadow mb-2">
        <div class="card-body border-bottom">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengurus_kelas as $pengurus)
                        <tr>
                            <td>{{ $pengurus->index }}</td>
                            <td>{{ $pengurus->jabatan }} Kelas</td>
                            <td> <button class="btn btn-warning btn-sm edit-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal"
                                    data-id_pengurus_kelas="{{ $pengurus->id_pengurus_kelas }}"
                                    data-jabatan="{{ $pengurus->jabatan }}">
                                    Edit
                                </button>
                                <form action="{{ route('pengurus-kelas.hapus', $pengurus->id_pengurus_kelas) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus Jabatan {{$pengurus->jabatan}}?')">Hapus</button>
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
            <form action="{{ route('pengurus-kelas.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Jabatan Pengurus Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <select name="jabatan" class="form-control">
                                <option value="">Pilih Jabatan</option>
                                <option value="Ketua">Ketua Kelas</option>
                                <option value="Wakil Ketua">Wakil Ketua Kelas</option>
                                <option value="Sekretaris">Sekretaris Kelas</option>
                                <option value="Bendahara">Bendahara Kelas</option>
                                <option value="Siswa">Siswa</option>
                            </select>
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
                        <h5 class="modal-title">Edit Jabatan Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="id_pengurus_kelas" id="edit-id_pengurus_kelas">
                            <select name="jabatan" class="form-control" id='edit-jabatan'>
                                <option value="">Pilih Jabatan</option>
                                <option value="Ketua">Ketua Kelas</option>
                                <option value="Wakil Ketua">Wakil Ketua Kelas</option>
                                <option value="Sekretaris">Sekretaris Kelas</option>
                                <option value="Bendahara">Bendahara Kelas</option>
                                <option value="Siswa">Siswa</option>
                            </select>
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
</div>
<!-- Script Modal Edit -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                let id_pengurus_kelas = this.dataset.id_pengurus_kelas;
                let jabatan = this.dataset.jabatan;

                document.getElementById('edit-jabatan').value = jabatan;
                document.getElementById('edit-id_pengurus_kelas').value = id_pengurus_kelas;

                document.getElementById('editForm').action = `./pengurus-kelas/update/${id_pengurus_kelas}`;
            });
        });
    });
</script>
@endsection