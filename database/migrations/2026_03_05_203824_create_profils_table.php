<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Contoh: "Sejarah Kelurahan"
            $table->string('slug')->unique(); // Contoh: "sejarah-kelurahan"
            $table->longText('konten'); // Isi halaman lengkap (bisa pakai Text Editor/CKEditor nantinya)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profils');
    }
};