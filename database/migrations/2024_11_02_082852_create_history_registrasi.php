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
        Schema::create('history_registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('nim'); // Foreign key ke tabel mahasiswa
            $table->integer('semester'); // Menyimpan semester pembayaran
            $table->integer('tagihan'); // Menyimpan jumlah tagihan pembayaran
            $table->timestamp('tanggal_bayar'); // Tanggal pembayaran
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_registrasi');
    }
};
