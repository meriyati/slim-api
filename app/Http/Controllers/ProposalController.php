<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    //Ajukan
    public function store(Request $request)
    {
        // Menyimpan data ke database
        $user = Auth::user();
        
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'proposal_file' => 'required|file|mimes:pdf,docx|max:10240', // Validasi file
        ]);
    

        // Menyimpan file
        if ($request->hasFile('proposal_file')) {
            $filePath = $request->file('proposal_file')->store('proposals', 'public'); // Menyimpan file di storage
        }
    
        // Membuat atau mengupdate data proposal untuk user
        $user->title = $validated['title'];
        $user->description = $validated['description'];
        $user->file_path = $filePath ?? null; // Jika ada file, simpan path-nya
        $user->status = 'Pending'; // Status default saat proposal diajukan
        $user->save(); // Simpan ke database
    
        return redirect()->route('home')->with('success', 'Proposal berhasil diajukan.');
    }
    public function showForm()
    {
        return view('submit-proposal'); // Mengarahkan ke view submit proposal
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('edit-proposal', compact('user'));
    }

    /**
     * Update the proposal in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validasi file
        ]);
        
        $user = User::findOrFail($id);
        
        // Cek apakah ada perubahan pada title atau description
        if (
            $user->title === $request->input('title') &&
            $user->description === $request->input('description') &&
            !$request->hasFile('file')
        ) {
            return redirect()->back()->with('warning', 'Tidak ada perubahan yang dilakukan pada proposal.');
        }
        
        // Update data
        $user->title = $request->input('title');
        $user->description = $request->input('description');
        
        // Jika file baru diunggah
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($user->file_path && Storage::exists($user->file_path)) {
                Storage::delete($user->file_path);
            }
        
            // Simpan file baru
            $filePath = $request->file('file')->store('proposals');
            $user->file_path = $filePath;
        }
        
        // Ubah status menjadi "Pending"
        $user->status = 'Pending';
        
        $user->save();
        
        return redirect()->route('home')->with('success', 'Proposal berhasil diperbarui!');
        

    }
    
}
