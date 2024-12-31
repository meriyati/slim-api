<?php
 
 namespace App\Http\Controllers;

 use App\Models\User;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Setting;
 
 class HomeController extends Controller
 {
     public function index()
     {
         // Mengambil proposal yang diajukan oleh user yang sedang login
         $user = User::where('id', Auth::id())->latest()->first(); // Mengambil proposal terakhir
 
         // Mengirim data proposal ke view home
         return view('home', compact('user'));
     }
 
     
 }
 