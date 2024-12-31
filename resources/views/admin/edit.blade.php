<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Status Proposal - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!-- Menyisipkan navbar -->
    @include('layouts.navbar')

    <div class="container mt-5">
        <h1>Edit Status Proposal</h1>

        <!-- Card for Proposal Details -->
        <div class="card mt-4">
            <div class="card-header">
                Detail Proposal
            </div>
            <div class="card-body">
                <!-- Judul Proposal -->
                <h3>{{ $user->title }}</h3>

                <!-- Deskripsi Proposal -->
                <p>{{ $user->description }}</p>

                <!-- Link Download Proposal -->
                @if ($user->file_path)
                  <a href="{{ Storage::url($user->file_path) }}" target="_blank">Download Proposal</a>
                @else
                  <p class="text-muted">Tidak ada file yang diunggah.</p>
                @endif
            </div>
        </div>

        <!-- Form Edit Status Proposal -->
        <div class="card mt-4">
            <div class="card-header">
                Edit Status Proposal
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateProposal', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Pilih status baru -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Proposal</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Pending" {{ old('status', $user->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diterima" {{ old('status', $user->status) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ old('status', $user->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
