<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID pengguna
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email (unik)
            $table->timestamp('email_verified_at')->nullable(); // Email verifikasi (nullable)
            $table->string('password'); // Password pengguna
            $table->string('npm')->unique(); // NPM (unik)
            $table->string('jurusan')->nullable(); // Jurusan (opsional)
            $table->string('tempat_lahir')->nullable(); // Tempat lahir (opsional)
            $table->text('alamat')->nullable(); // Alamat (opsional)
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable(); // Jenis kelamin
            $table->string('agama')->nullable(); // Agama (opsional)
            $table->string('nama_ibu')->nullable(); // Nama ibu (opsional)
    
            // Adding new columns without the 'after' clause
            $table->string('title')->nullable(); // Title
            $table->text('description')->nullable(); // Description
            $table->string('file_path')->nullable(); // File path
            $table->enum('status', ['Pending', 'Diterima', 'Ditolak'])->nullable(); // Status
    
            $table->rememberToken(); // Token remember me
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
