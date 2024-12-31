<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Mahasiswa - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <!-- Card untuk Profile -->
          <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
              <h3 class="mb-0"><i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name }}</h3>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>NPM</strong>:</span> <span>{{ Auth::user()->npm }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Email</strong>:</span> <span>{{ Auth::user()->email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Jurusan</strong>:</span> <span>{{ Auth::user()->jurusan }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Tempat Lahir</strong>:</span> <span>{{ Auth::user()->tempat_lahir }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Alamat</strong>:</span> <span>{{ Auth::user()->alamat }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Jenis Kelamin</strong>:</span> <span>{{ Auth::user()->jenis_kelamin }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Agama</strong>:</span> <span>{{ Auth::user()->agama }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Nama Ibu</strong>:</span> <span>{{ Auth::user()->nama_ibu }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Role</strong>:</span> <span>{{ Auth::user()->role }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span><strong>Joined on</strong>:</span> <span>{{ Auth::user()->created_at->format('d-m-Y') }}</span>
                </li>
              </ul>
              <div class="mt-4 text-center">
                <a href="/edit-profile" class="btn btn-outline-warning mt-3"><i class="fas fa-edit me-1"></i>Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footer')

  </body>
</html>
