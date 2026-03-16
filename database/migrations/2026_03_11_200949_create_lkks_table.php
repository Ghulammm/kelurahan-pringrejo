<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('lkks', function (Blueprint $table) {
        $table->id();
        $table->string('kategori'); // pkk, lpm, bkm, karang-taruna, rtrw, posyandu
        $table->string('nama_lembaga');
        $table->string('foto')->nullable();
        $table->text('deskripsi');
        $table->longText('konten_detail'); // Untuk isi profil lengkap
        $table->timestamps();
    });
}
};
