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
        Schema::create('dosen_pengampu', function (Blueprint $table) {
            $table->string('nidn_dosen');
            $table->string('id_jadwal');
            $table->foreign('nidn_dosen')->references('nidn')->on('dosen')->onDelete('cascade');;
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade');;
            $table->primary(['nidn_dosen','id_jadwal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('dosen_pengampu');
    }
};
