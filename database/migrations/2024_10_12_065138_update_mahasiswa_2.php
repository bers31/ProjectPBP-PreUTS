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
            $table->char('tahun_masuk', 4)->default(now()->year);
            $table->char('tahun_akademik',9)->default(now()->year. '/'. (now()->year)+1);
            $table->enum('status', ['aktif','cuti','skorsing','lulus','non-aktif', 'mangkir'])->default('non-aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropColumn('tahun_masuk');
            $table->dropColumn('tahun_akademik');
            $table->dropColumn('status');
        });
    }
};
