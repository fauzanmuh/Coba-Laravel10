@extends('layout/aplikasi')

@section('konten')
<form method="POST" action="/siswa/{{ $data->nis }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb3">
        <h1> Nomor Induk: {{ $data->nis }}</h1>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="nama" class="form-control" name="nama" id="nama" value="{{ $data->nama }}" placeholder="Fauzan">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat">{{ $data->alamat }}</textarea>
    </div>
    @if ($data->foto)
    <div class="mb-3">
        <img style="max-width: 50px" src="{{ url('foto').'/'.$data->foto }}">
    </div>
    @endif
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" value="{{ $data->foto }}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
