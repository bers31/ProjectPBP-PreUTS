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
        Schema::create('dekan', function (Blueprint $table) {
            $table->id();
            $table->string('nidn');
            $table->foreign('nidn')->references('nidn')->on('dosen')->onDelete('cascade');;
            $table->string('fakultas_id');
            $table->foreign('fakultas_id')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');;
            $table->date('awal_jabatan');
            $table->date('akhir_jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('dekan');
    }
};
