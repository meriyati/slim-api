<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <style>
        .navbar {
            background-color: #f8f9fa; /* Warna latar belakang yang lembut */
            padding: 1rem; /* Padding tambahan untuk ruang lebih */
        }
        .navbar-brand {
            font-size: 2rem; /* Ukuran font lebih proporsional */
            font-weight: bold; /* Memberikan kesan tegas */
            color: #007bff; /* Warna teks dengan aksen biru */
        }
        .navbar-brand:hover {
            color: #0056b3; /* Warna hover lebih gelap */
            text-decoration: none; /* Hilangkan garis bawah */
        }
        .btn-danger {
            background-color: #dc3545; /* Warna merah tombol */
            border-color: #dc3545; /* Warna border tombol */
        }
        .btn-danger:hover {
            background-color: #c82333; /* Warna merah lebih gelap saat hover */
            border-color: #bd2130; /* Warna border lebih gelap saat hover */
        }
        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.075); /* Efek bayangan */
        }
    </style>
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Menempatkan navbar-brand di tengah -->
        <a class="navbar-brand mx-auto" href="#">Aplikasi Mahasiswa</a>
        <!-- Tombol logout berada di kanan -->
        <form action="{{ route('logout') }}" method="POST" class="d-flex ms-auto" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger rounded-pill px-4" type="submit">Logout</button>
        </form>
    </div>
</nav>
