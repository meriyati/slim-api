<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Halaman registrasi
    public function register()
    {
        return view('register');
    }

    // Proses registrasi
    public function registerPost(Request $request)
    {
          // Validasi input
    $validated = $request->validate([
        'npm' => 'required|min:10|unique:users,npm', // Validasi agar npm unik
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email', // Validasi agar email unik
        'password' => 'required|min:6|confirmed', // Validasi password dengan konfirmasi
    ]);
    
        // Membuat objek user baru
        $user = new User();
        
        // Menyimpan data yang diterima dari form
        $user->npm =$request->npm; // Menambahkan ID
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        // Menyimpan data user ke database
        $user->save();
    
        // Mengirimkan response kembali dengan pesan sukses
        return back()->with('success', 'Register successfully');
    }

    
// Halaman login
public function login()
{
    return view('login');
}

public function loginPost(Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    // Cek kredensial login
    if (Auth::attempt($credentials)) {
        // Ambil pengguna yang terautentikasi
        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('home');
        }
    }

    return back()->with('error', 'Error Email or Password');
}


    // Logout
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }

    // Halaman home setelah login
    public function home()
    {
        return view('home');
    }
}
