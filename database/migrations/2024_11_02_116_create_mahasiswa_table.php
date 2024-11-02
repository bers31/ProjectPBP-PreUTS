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
            $table->integer('semester')->default(1);
            $table->integer('sks')->default(0);
            $table->decimal('ipk',2,2)->default(0);
            $table->string('prodi');
            $table->foreign('prodi')->references('kode_prodi')->on('prodi');
            $table->string('doswal');
            $table->enum('status', ['aktif','cuti','skorsing','lulus','non-aktif', 'mangkir'])->default('non-aktif');
            $table->char('tahun_masuk', 4)->default(now()->year);
            $table->timestamps();

            $table->foreign('doswal')->references('nidn')->on('dosen')->onDelete('cascade');
        });
    }
        
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mahasiswa');
    }
};
