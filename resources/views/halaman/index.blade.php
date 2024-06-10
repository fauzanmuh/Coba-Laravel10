<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Halaman Utama</title>
</head>

<body>
    <div>
        @extends('layout/aplikasi')

        @section('konten')
            <header class="header">
                <div class="logo">Website Kami</div>
                <nav>
                    <a href="index.html">Home</a>
                    <a href="/tentang">About</a>
                    <a href="/contact">Kontak</a>
                </nav>
            </header>

            <div class="container">
                <h1>Selamat Datang di Website Kami</h1>
                <a href="/sesi" class="button">Login</a>
                <a href="sesi/register" class="button">Registrasi</a>
            </div>
        @endsection
    </div>
</body>

</html>
