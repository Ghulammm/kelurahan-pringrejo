<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    // Sesuaikan dengan nama kolom di gambar
    protected $fillable = [
        'nama_kegiatan', 
        'deskripsi', 
        'tanggal_pelaksanaan', 
        'lokasi'
    ];
}