@extends('layout/aplikasi')

@section('konten')
    <div>
        <a href="/siswa" class="btn btn-success">Kembali</a>
        <h1>{{ $data->nama }}</h1>
        <p>NIS : {{ $data->nis }}</p>
        <p>Alamat : {{ $data->alamat }}</p>
        <p>Foto : <img src="{{ url('foto').'/'.$data->foto }}" width="100px"></p>
    </div>
@endsection