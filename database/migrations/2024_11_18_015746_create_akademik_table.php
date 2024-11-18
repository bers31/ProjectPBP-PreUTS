<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikTable extends Migration
{
    public function up()
    {
        Schema::create('akademik', function (Blueprint $table) {
            $table->string('nidn')->primary();
            $table->string('kode_fakultas');
            $table->foreign('kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');;
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('akademik');
    }
}