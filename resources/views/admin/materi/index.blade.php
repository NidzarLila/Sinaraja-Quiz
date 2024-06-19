@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Daftar Materi</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addMateriModal">Tambah Materi</button>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Materi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->materi }}</td>
                        <td>
                            @if($item->gambar)
                                <a href="{{ asset('storage/' . $item->gambar) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="img-large" alt="{{ $item->materi }}">
                                </a>
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editMateriModal{{ $item->id }}">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteMateriModal{{ $item->id }}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Materi Modal -->
<div class="modal fade" id="addMateriModal" tabindex="-1" role="dialog" aria-labelledby="addMateriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMateriModalLabel">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="materi">Materi</label>
                        <textarea name="materi" id="materi" class="form-control" rows="5" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Materi Modal -->
@foreach($materi as $item)
<div class="modal fade" id="editMateriModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editMateriModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMateriModalLabel{{ $item->id }}">Edit Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('materi.update', $item) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $item->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea name="content" id="content" class="form-control" required>{{ $item->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_url">URL Gambar</label>
                        <input type="url" name="image_url" id="image_url" class="form-control" value="{{ $item->image_url }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Materi Modal -->
@foreach($materi as $item)
<div class="modal fade" id="deleteMateriModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMateriModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMateriModalLabel{{ $item->id }}">Hapus Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus materi ini?</p>
                <form action="{{ url('materi.destroy', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection