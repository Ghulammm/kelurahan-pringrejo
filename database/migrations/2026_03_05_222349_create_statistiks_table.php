<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PASTIKAN NAMA CLASS DI BAWAH INI ADALAH CreateStatistiksTable
return new class extends Migration
{
    public function up()
    {
        Schema::create('statistiks', function (Blueprint $table) {
            $table->id();
            $table->string('jml_penduduk')->default('0');
            $table->string('luas_wilayah')->default('0');
            $table->string('jml_rw')->default('0');
            $table->string('jml_rt')->default('0');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statistiks');
    }
};