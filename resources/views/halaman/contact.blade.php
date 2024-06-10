@extends('layout/aplikasi')
@section('konten')
<h1>{{ $judul }}</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing 
    elit. Quod, esse aperiam? Dolore facere ipsa, 
    voluptatum maiores iure ea ratione minima vel fugit 
    unde sit, voluptatibus laudantium reiciendis minus 
    doloribus ullam distinctio.</p>
    <ul>
    <li>Email : {{ $kontak['email'] }}</li>
    <li>Youtube : {{ $kontak['youtube'] }}</li>
    </ul>
@endsection