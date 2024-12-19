<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pending_room_changes', function (Blueprint $table) {
            $table->id();
            $table->enum('action_type', ['create', 'update', 'delete']);
            $table->string('kode_ruang');
            $table->string('kode_departemen');
            $table->string('kode_prodi')->nullable();
            $table->integer('kapasitas');
            $table->enum('status_ketersediaan', ['Tersedia', 'Penuh'])->default('Tersedia');
            $table->json('old_data')->nullable();
            $table->json('new_data')->nullable();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('created_by');
            $table->string('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_room_changes');
    }
};
