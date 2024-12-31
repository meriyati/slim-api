<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .table th, .table td {
            text-align: center;
        }
    </style>
    <script>
        function confirmDelete(event) {
            // Mencegah form submit jika user tidak mengonfirmasi
            if (!confirm("Apakah Anda yakin ingin menghapus pengguna ini?")) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>

    <!-- Menyisipkan navbar -->
    @include('layouts.bar')

    <div class="container mt-5">
        <h1 class="text-center">Pengaturan Jadwal Pengajuan Proposal</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Card untuk form pengaturan, dengan lebar 50% dari kontainer -->
        <div class="card mt-4 w-50 mx-auto">
            <div class="card-header">
                <h5 class="text-center">Atur Jadwal Pengajuan Proposal</h5> <!-- Teks di tengah -->
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateSettings') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label  for="start_date" class="form-label">Tanggal Mulai Pengajuan Proposal</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $setting->start_date ?? '') }}" required>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Tanggal Akhir Pengajuan Proposal</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $setting->end_date ?? '') }}" required>
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                </form>
            </div>
        </div>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>

</body>
</html>
