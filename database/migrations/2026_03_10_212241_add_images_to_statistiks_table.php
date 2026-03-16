<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menambah kolom.
     */
    public function up()
    {
        Schema::table('statistiks', function (Blueprint $table) {
            // Menambahkan kolom string untuk menyimpan nama file gambar
            // Digunakan ->after('jml_rt') agar posisi kolom rapi setelah jumlah RT
            $table->string('gambar_kantor')->nullable()->after('jml_rt');
            $table->string('gambar_wilayah')->nullable()->after('gambar_kantor');
        });
    }

    /**
     * Batalkan migrasi (Rollback).
     */
    public function down()
    {
        Schema::table('statistiks', function (Blueprint $table) {
            $table->dropColumn(['gambar_kantor', 'gambar_wilayah']);
        });
    }
};