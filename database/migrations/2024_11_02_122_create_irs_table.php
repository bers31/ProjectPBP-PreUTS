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
        Schema::create('irs', function (Blueprint $table) {
            $table->id('id_irs');
            $table->string('nim_mahasiswa');
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->integer('semester');
            $table->unique(['nim_mahasiswa', 'semester']);
            $table->string('kode_tahun');
            $table->foreign('kode_tahun')->references('kode_tahun')->on('tahun_ajaran')->onDelete('cascade');
            $table->date('tanggal_pengisian')->nullable();
            $table->enum('status',['belum_irs','belum_disetujui','sudah_disetujui'])->default('belum_irs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('irs');
    }
};
