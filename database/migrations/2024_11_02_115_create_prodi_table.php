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
        Schema::create('prodi', function (Blueprint $table) {
            $table->string('kode_prodi')->primary();
            $table->string('nama');
            $table->enum('strata',['S1','S2','S3'])->nullable();
            $table->string('kode_departemen')->nullable();
            $table->foreign('kode_departemen')->references('kode_departemen')->on('departemen')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('prodi');
    }
};
