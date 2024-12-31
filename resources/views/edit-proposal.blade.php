<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Proposal - Aplikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="container mt-5">
      <!-- Flash Messages -->
      @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-triangle me-2"></i>{{ session('warning') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
          <h4 class="d-flex align-items-center">
            <i class="fas fa-edit me-2"></i> Edit Proposal
          </h4>
        </div>
        <div class="card-body">
          <!-- Form untuk mengedit proposal -->
          <form action="{{ route('edit-proposal.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $user->title) }}" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $user->description) }}</textarea>
            </div>

            <div class="mb-3">
              <label for="file" class="form-label">Upload New File (Optional)</label>
              <input type="file" class="form-control" id="file" name="file">
              <small class="text-muted">Current file: <a href="{{ Storage::url($user->file_path) }}" target="_blank">Download</a></small>
            </div>

            <div class="mt-4">
              <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i>Save Changes</button>
              <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i>Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    @include('layouts.footer')
  </body>
</html>
