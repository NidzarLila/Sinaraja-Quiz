@extends('layouts.app')
@section('content')
<div class="container">

    <h1>Daftar Soal</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addMateriModal">Tambah Soal</button>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Pilihan</th>
                        <th>Jawaban</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                 <tbody>
                     <tbody>
                    @foreach($soal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pertanyaan }}</td>
                        <td>{{ $item->pilihan }}</td>
                        <td>{{ $item->jawaban }}</td>
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
<div class="modal fade" id="addMateriModal" tabindex="-1" role="dialog" aria-labelledby="addMateriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMateriModalLabel">Tambah Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan:</label><br>
                        <input type="text" id="pertanyaan" name="pertanyaan" class="form-control">
                    </div>

                    <div id="choice-container">
                        <div>
                            <label for="pilihan_1">Pilihan A:</label><br>
                            <input type="text" id="pilihan_1" name="pilihan[]" class="form-control"><br><br>
                        </div>
                    </div>
                    <button type="button" onclick="addChoice()">Tambah Pilihan</button><br><br>

                    <label for="jawaban">Jawaban:</label><br>
                    <input type="text" id="jawaban" name="jawaban" class="form-control"><br><br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Materi Modal -->
<!--  -->
<script>
    function addChoice() {
        const choiceContainer = document.getElementById('choice-container');
        const choiceCount = choiceContainer.children.length + 1;
        const newChoice = document.createElement('div');
        newChoice.innerHTML = `
                   <label for="pilihan_${choiceCount}">Pilihan ${String.fromCharCode(64 + choiceCount)}:</label><br>
                   <input type="text" id="pilihan_${choiceCount}" name="pilihan[]" class="form-control"><br><br>
               `;
        choiceContainer.appendChild(newChoice);
    }
</script>
@endsection