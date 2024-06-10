<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('session.index');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($infoLogin)) {
            return redirect('/siswa')->with('success', Auth::user()->name . ' Login Berhasil');
        }
        else {
            return 'gagal';
        }
    }

    function logout()
    {
        auth()->logout();
        return redirect('/sesi')->with('success', 'Logout Berhasil');
    }

    function register()
    {
        return view('session.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:4',
        ], [
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email harus valid',
            'name.required' => 'Name harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 4 karakter',

        ]);
        
        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($infoLogin)) {
            return redirect('/siswa')->with('success', Auth::user()->name . ' Login Berhasil');
        }
        else {
            return 'gagal';
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
