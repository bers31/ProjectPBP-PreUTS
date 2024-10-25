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
        Schema::create('dosen', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('role',['dosen', 'mahasiswa','admin'])->nullable;
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('dosen');
    }
};
