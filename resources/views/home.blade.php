<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="style_aplikasi_mahasiswa.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="container mt-5">
      <!-- Menampilkan Proposal jika ada -->
      @if ($user && $user->title)
  <div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white">
      <h4 class="d-flex align-items-center">
        <i class="fas fa-file-alt me-2"></i> Proposal Anda
      </h4>
    </div>
    <div class="card-body">
      <h5><strong>Title:</strong> {{ $user->title }}</h5>
      <p><strong>Description:</strong> {{ $user->description }}</p>
      <p><strong>File:</strong> <a href="{{ Storage::url($user->file_path) }}" target="_blank" class="text-decoration-none"><i class="fas fa-download me-1"></i>Download Proposal</a></p>
      <p><strong>Status:</strong>
        <!-- Menambahkan warna dan ukuran font berdasarkan status -->
        @if ($user->status == 'Ditolak')
          <span class="badge bg-danger fs-6"><i class="fas fa-times-circle me-1"></i>Ditolak</span>
        @elseif ($user->status == 'Pending')
          <span class="badge bg-warning text-dark fs-6"><i class="fas fa-hourglass-half me-1"></i>Pending</span>
        @elseif ($user->status == 'Diterima')
          <span class="badge bg-success fs-6"><i class="fas fa-check-circle me-1"></i>Diterima</span>
        @endif
      </p>

      <!-- Percabangan untuk menampilkan tombol Edit Proposal berdasarkan status -->
      @if ($user->status == 'Ditolak' || $user->status == 'Pending')
        <a href="{{ route('edit-proposal.edit', $user->id) }}" class="btn btn-outline-warning mt-3"><i class="fas fa-edit me-1"></i>Edit Proposal</a>
      @endif
    </div>
  </div>
@else
  <div class="text-center mt-5">
    <i class="fas fa-folder-open fa-3x text-muted"></i>
    <p class="mt-3 fs-5">Proposal belum diajukan.</p>
    <a href="{{ route('submit-proposal.form') }}" class="btn btn-primary mt-3"><i class="fas fa-plus-circle me-1"></i>Ajukan Proposal</a>
  </div>
@endif

    </div>
    @include('layouts.footer')
  </body>
</html>
