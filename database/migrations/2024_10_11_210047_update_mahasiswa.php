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
        //
        Schema::table('mahasiswa', function (Blueprint $table) {
            // Modify the 'role' column to include 'admin' as one of the possible roles
            $table->integer('semester')->default(1)->change();
            $table->integer('sks')->default(0)->change();
            $table->decimal('ipk',2,2)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->integer('semester');
            $table->integer('sks');
            $table->decimal('ipk',2,2);
        });
    }
};
