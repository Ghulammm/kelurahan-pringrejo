<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini diisi data
    protected $fillable = [
        'judul',
        'slug',
        'kategori', 
        'konten',
        'gambar',
        'tanggal_publish',
    ];
}