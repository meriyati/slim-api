<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pengguna - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.bar')

    <div class="container mt-5">
        <h1 class="text-center">Detail Pengguna</h1>
        <div class="card shadow-lg">
            <div class="card-header text-center bg-primary text-white">
                Informasi Pengguna
            </div>
            <div class="card-body">
                <!-- User Information -->
                <p><strong>NPM:</strong> {{ $user->npm }}</p>
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Jurusan:</strong> {{ $user->jurusan }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $user->tempat_lahir }}</p>
                <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}</p>
                <p><strong>Agama:</strong> {{ $user->agama }}</p>
                <p><strong>Nama Ibu:</strong> {{ $user->nama_ibu }}</p>
                
                <!-- Display Proposal details if available -->
                <h4 class="mt-4">Proposal</h4>
                @if($user->title)
                    <div class="card mt-4">
                        <div class="card-header">
                            Detail Proposal
                        </div>
                        <div class="card-body">
                            <p><strong>Judul Proposal:</strong> {{ $user->title }}</p>
                            <p><strong>Deskripsi:</strong> {{ $user->description }}</p>
                            <p><strong>Status:</strong> {{ $user->status }}</p>
                            
                            <!-- Link untuk mengunduh file proposal jika tersedia -->
                            @if($user->file_path)
                                <p><strong>File Proposal:</strong> <a href="{{ Storage::url($user->file_path) }}" target="_blank" class="text-decoration-none"><i class="fas fa-download me-1"></i>Unduh Proposal</a></p>
                            @endif
                            
                            <!-- Button to Edit Proposal Status if Pending or Rejected -->
                            @if(in_array($user->status, ['Pending', 'Ditolak']))
                                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning">Edit Status</a>
                            @endif
                        </div>
                    </div>
                @else
                    <p class="text-muted">Proposal belum diajukan.</p>
                @endif
            </div>
        </div>
        
        <!-- Action Button -->
        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
        </div>
    </div>
    @include('layouts.footer')

  </body>
</html>
