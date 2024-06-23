@extends('layouts.app')
@section('content')
<div class="container">

    <h1>Profil</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addProfilModal">Tambah Profil</button>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Univ</th>
                        <th>Prodi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @foreach($profil as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->ttl }}</td>
                        <td>{{ $item->univ }}</td>
                        <td>{{ $item->prodi }}</td>
                    
                        <td>
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-thumbnail" alt="{{ $item->foto }}">
                        </td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editProfilModal{{ $item->id }}">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProfilModal{{ $item->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="addProfilModal" tabindex="-1" role="dialog" aria-labelledby="addProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfilModalLabel">Tambah Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ttl">TTL:</label>
                        <input type="text" id="ttl" name="ttl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="univ">Univ:</label>
                        <input type="text" id="univ" name="univ" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi:</label>
                        <input type="text" id="prodi" name="prodi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" class="form-control">
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Edit Materi Modal -->
@foreach($profil as $item)
<div class="modal fade" id="editProfilModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editProfilModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfilModalLabel{{ $item->id }}">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profil.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>{{ $item->nama }}</input>
                    </div>
                    <div class="form-group">
                        <label for="ttl">TTL</label>
                        <input type="text" name="ttl" id="ttl" class="form-control" required>{{ $item->ttl }}</input>
                    </div>
                    <div class="form-group">
                        <label for="univ">Univ</label>
                        <input type="text" name="univ" id="univ" class="form-control" required>{{ $item->univ }}</input>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <input type="text" name="prodi" id="prodi" class="form-control" required>{{ $item->prodi }}</input>
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Materi Modal -->
@foreach($profil as $item)
<div class="modal fade" id="deleteProfilModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteProfilModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProfilModalLabel{{ $item->id }}">Hapus Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus materi ini?</p>
                <form action="{{ route('profil.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Add Materi Modal -->
<!--  -->

@endsection