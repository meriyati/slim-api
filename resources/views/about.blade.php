<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style_aplikasi_mahasiswa.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="container mt-4">
      <h1>About Aplikasi Mahasiswa</h1>
      <p>Aplikasi Mahasiswa is a platform designed to help students manage their academic information, interact with their academic records, and stay updated on university activities. The application provides features like student profile management, grades monitoring, and more.</p>
      <h2>Features:</h2>
      <ul>
        <li>Student Profile Management</li>
        <li>Grade Monitoring</li>
        <li>Event Notifications</li>
        <li>Logout functionality</li>
      </ul>
    </div>
    @include('layouts.footer')

  </body>
</html>
