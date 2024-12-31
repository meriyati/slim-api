<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <style>
    .navbar {
      background-color: #f8f9fa; /* Warna latar belakang */
    }
    .navbar-brand {
      font-size: 1.75rem; /* Ukuran font proporsional */
      font-weight: bold; /* Teks lebih menonjol */
      color: #007bff; /* Warna teks biru */
    }
    .navbar-brand:hover {
      color: #0056b3; /* Warna hover biru lebih gelap */
      text-decoration: none; /* Hilangkan garis bawah */
    }
    .nav-link {
      font-size: 1rem; /* Ukuran font untuk navigasi */
      color: #343a40; /* Warna teks default */
      transition: color 0.3s ease; /* Animasi transisi */
    }
    .nav-link:hover {
      color: #007bff; /* Warna teks saat hover */
    }
    .nav-link.active {
      color: #007bff; /* Warna teks untuk halaman aktif */
      font-weight: bold; /* Teks halaman aktif lebih tebal */
    }
    .dropdown-menu {
      border-radius: 0.5rem; /* Border membulat */
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Bayangan dropdown */
    }
    .navbar-text {
      font-size: 1rem; /* Ukuran teks sambutan */
      color: #343a40; /* Warna teks */
    }
    .btn-outline-danger {
      border-color: #dc3545; /* Warna border */
      color: #dc3545; /* Warna teks */
    }
    .btn-outline-danger:hover {
      background-color: #dc3545; /* Warna latar saat hover */
      color: #fff; /* Warna teks saat hover */
    }
    .navbar-toggler {
      border: none; /* Hilangkan border tombol toggler */
    }
  </style>
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aplikasi Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/settings">Settings</a></li>
            <li><a class="dropdown-item" href="/help">Help</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <span class="navbar-text me-3">
          Welcome, {{ auth()->user()->name }}
        </span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger rounded-pill" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </div>
</nav>
