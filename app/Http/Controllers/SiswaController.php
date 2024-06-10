<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index()
    {
        $data = Siswa::orderBy('nis', 'desc')->paginate(1);
        return view('siswa.index', ['data' => $data]); 
    }

    function create()
    {
        return view('siswa.create'); 
    }

    function delete()
    {
        return view('siswa.delete'); 
    }

    function detail($id)
    {
        $data = Siswa::where('nis', $id)->first();
        return view('siswa.detail', ['data' => $data]); 
    }
}
