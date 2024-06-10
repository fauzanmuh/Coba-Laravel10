<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::orderBy('nis', 'desc')->paginate(4);
        return view('siswa.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nis.required' => 'NIS harus diisi',
            'nis.numeric' => 'NIS harus berupa angka',
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.mimes' => 'Foto harus berupa jpeg,png,jpg'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_baru = date('YmdHis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_baru);

        $data = [
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_baru
        ];

        Siswa::create($data);

        return redirect('siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::where('nis', $id)->first();
        return view('siswa.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Siswa::where('nis', $id)->first();
        return view('siswa.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ], [
                'foto.mimes' => 'Foto harus berupa jpeg,png,jpg'
            ]);

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('YmdHis') . '.' . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_baru);

            $data_foto = Siswa::where('nis', $id)->first();
            File::delete('foto/' . $data_foto->foto);
            $data['foto'] = $foto_baru;
        }

        Siswa::where('nis', $id)->update($data);
        return redirect('siswa')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Siswa::where('nis', $id)->first();
        File::delete('foto/' . $data->foto);

        Siswa::where('nis', $id)->delete();
        return redirect('siswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
