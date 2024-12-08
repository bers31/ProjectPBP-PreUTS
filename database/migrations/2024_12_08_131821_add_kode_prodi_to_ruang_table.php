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
        Schema::table('ruang', function (Blueprint $table) {
            // Tambah kolom kode_prodi yang bisa null
            $table->string('kode_prodi')->nullable()->after('kode_fakultas');
            
            // Tambah foreign key ke tabel prodi
            $table->foreign('kode_prodi')
                  ->references('kode_prodi')
                  ->on('prodi')
                  ->onDelete('set null')  // Jika prodi dihapus, set kode_prodi jadi null
                  ->onUpdate('cascade');  // Jika kode_prodi diupdate, update juga di tabel ruang
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ruang', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu
            $table->dropForeign(['kode_prodi']);
            
            // Kemudian hapus kolom kode_prodi
            $table->dropColumn('kode_prodi');
        });
    }
};