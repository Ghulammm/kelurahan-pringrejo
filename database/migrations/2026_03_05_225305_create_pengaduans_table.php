<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// PASTIKAN NAMA CLASS DI BAWAH INI ADALAH CreateStatistiksTable
return new class extends Migration
{
    public function up()
{
    Schema::create('pengaduans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pengadu');
        $table->string('nik', 16);
        $table->string('judul_aduan');
        $table->text('isi_aduan');
        $table->string('foto_bukti')->nullable();
        // Status: Menunggu, Proses, Selesai
        $table->enum('status', ['menunggu', 'proses', 'selesai'])->default('menunggu');
        $table->timestamps();
    });

    }
};