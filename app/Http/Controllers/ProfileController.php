<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();
        return view('profile', compact('user')); // Menyertakan data user ke view profile.blade.php
    }

    public function edit()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('edit-profile', compact('user')); // Menampilkan halaman edit-profile
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Mengambil data user yang sedang login

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
            'jurusan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'nama_ibu' => 'required|string|max:255',
        ]);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->jurusan = $request->input('jurusan');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->alamat = $request->input('alamat');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->agama = $request->input('agama');
        $user->nama_ibu = $request->input('nama_ibu');

        // Update password jika ada
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
