<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use App\Models\Proposal;

use Illuminate\Http\Request;

class AdminController extends Controller
{
// Filter users with role 'user' (assuming 'user' is the role for students)
    public function index()
    {$users = User::where('role', 'user')->get();
        
     return view('admin.dashboard', compact('users'));
    }

// Fungsi untuk mengedit pengguna (optional)
    public function edit($id)
    {   $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

// Fungsi untuk menghapus pengguna (optional)
    public function delete($id)
    {   $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }

// Menyimpan data mahasiswa
    public function store(Request $request) {
// Validasi data
    $validated = $request->validate([
        'npm' => 'required|unique:users',
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8', // Password harus minimal 8 karakter
    ]);

// Menyimpan data mahasiswa baru
    $user = new User();
    $user->npm = $validated['npm'];
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = bcrypt($validated['password']); // Enkripsi password
    $user->save();
    return redirect()->route('admin.create')->with('success', 'Mahasiswa berhasil ditambahkan');
}

// Menampilkan view 'admin.create' untuk form tambah mahasiswa
    public function create() {
    return view('admin.create');}

// Menampilkan halaman pengaturan
public function settings()
{
    // Ambil pengaturan pertama dari database (karena hanya ada satu pengaturan)
    $setting = Setting::first();
    
    return view('admin.settings', compact('setting'));
}

// Mengupdate pengaturan jadwal pengajuan proposal
public function updateSettings(Request $request)
{
    // Validasi input tanggal
    $request->validate([
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ]);

    // Jika pengaturan sudah ada, update, jika belum, buat baru
    Setting::updateOrCreate(
        ['id' => 1],
        ['start_date' => $request->start_date, 'end_date' => $request->end_date]
    );

    return redirect()->route('admin.settings')->with('success', 'Pengaturan jadwal pengajuan proposal berhasil diperbarui.');
}

// Cari data pengguna berdasarkan ID
public function show($id)
{
    $user = User::findOrFail($id);

    // Kirim data pengguna dan proposal ke view
    return view('admin.detail', compact('user'));
}

public function updateProposal(Request $request, $id)
{
    // Validasi input status
    $request->validate([
        'status' => 'required|in:Pending,Diterima,Ditolak',
    ]);

    // Ambil data user berdasarkan ID
    $user = User::findOrFail($id);

    // Perbarui status user (sebagai status proposal)
    $user->status = $request->status;
    $user->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin.dashboard')->with('success', 'Status proposal berhasil diperbarui.');
}


}
