@extends('layout/aplikasi')

@section('konten')
<form method="POST" action="/siswa" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="nama" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Fauzan">
    </div>
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="nis" class="form-control" name="nis" id="nis" value="{{ old('nis') }}">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" value="{{ old('foto') }}">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
