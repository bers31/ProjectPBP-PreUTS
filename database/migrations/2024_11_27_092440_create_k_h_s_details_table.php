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
        Schema::create('khs_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id_irs');
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedInteger('nilai',false,3);
            $table->foreign('id_irs')->references('id_irs')->on('irs')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade');
            $table->primary(['id_irs','id_jadwal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_h_s_details');
    }
};
