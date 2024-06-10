<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view('halaman/index');
    }

    function tentang()
    {
        return view('halaman/tentang');
    }

    function contact()
    {
        $data = [
        'judul' => 'Halaman Contact', 
        'kontak' => [
            'email' => 'mufauzan18gmail.com',
            'youtube' => 'https://youtube.com'
        ]];
        return view('halaman/contact')->with($data);
    }
}
