<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .table th, .table td {
            text-align: center;
        }
    </style>
    <script>
        function confirmDelete(event) {
            // Prevent form submission if user does not confirm
            if (!confirm("Apakah Anda yakin ingin menghapus pengguna ini?")) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.bar')

    <div class="container mt-5">
        <h1 class="text-center">Welcome, Admin</h1>
        <p class="text-center">You are logged in as an Admin</p>

        <!-- Data Mahasiswa Table -->
        <h3 class="text-center">Data Mahasiswa</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>NPM</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Judul Proposal</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->npm }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->title }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('admin.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('admin.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add Student and Settings Buttons -->
        <div class="mt-4 d-flex justify-content-between">
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
            <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Pengaturan</a>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')
</body>
</html>
