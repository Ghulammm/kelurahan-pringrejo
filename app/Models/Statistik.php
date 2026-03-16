<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $table = 'statistiks'; // Memastikan nama tabel sesuai

    protected $fillable = [
        'jml_penduduk',
        'luas_wilayah',
        'jml_rw',
        'jml_rt',
        'gambar_kantor',
        'gambar_wilayah'
    ];
}