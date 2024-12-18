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
        Schema::create('tahun_ajaran', function (Blueprint $table) {
            $table->string('kode_tahun')->primary();
            $table->enum('bag_semester',['gasal','genap']);
            $table->char('tahun_akademik',9)->default(now()->year. '/'. (now()->year)+1);
            $table->enum('status',['aktif','non-aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tahun_ajaran');
    }
};
