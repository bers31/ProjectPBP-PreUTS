<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('mata_kuliah');            // Nama mata kuliah
            $table->string('hari');                   // Hari pelaksanaan, misal "Senin"
            $table->time('jam_mulai');                // Waktu mulai kelas
            $table->time('jam_selesai');              // Waktu selesai kelas
            $table->foreignId('ruang_kelas_id')       // Relasi dengan tabel ruang_kelas
                  ->constrained('ruang_kelas')
                  ->onDelete('cascade');
            $table->enum('status', ['pending', 'disetujui', 'ditetapkan']) // Status jadwal
                  ->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}

