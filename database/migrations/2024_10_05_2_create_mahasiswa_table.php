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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('departemen');
            $table->string('fakultas');
            $table->string('nip_doswal');
            $table->decimal('ipk',2,2);
            $table->timestamps();

            $table->foreign('nip_doswal')->references('nip')->on('dosen')->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            // Modify the 'role' column to include 'admin' as one of the possible roles
            $table->enum('role', ['mahasiswa', 'dosen', 'admin'])->default('mahasiswa')->change();
        });
    }
        
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mahasiswa');
        // Schema::enableForeignKeyConstraints();
    }
};
