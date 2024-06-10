@extends('layout/aplikasi')

@section('konten')
<a href="/siswa/create" class="btn btn-primary">Tambah</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $s)
                <tr>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>
                        @if ($s->foto)
                            <img src="{{ url('foto').'/'.$s->foto }}" width="45px"></td>
                        @endif
                    <td>
                        <a href="/siswa/{{ $s->nis }}" class="btn btn-primary">Detail</a>
                        <a href="/siswa/{{ $s->nis }}/edit" class="btn btn-warning">Edit</a>
                        <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" action="/siswa/{{ $s->nis }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
