<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';
    protected $fillable = ['judul', 'slug', 'konten'];

    // Membuat slug otomatis setiap kali admin menyimpan/update judul
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($profil) {
            $profil->slug = Str::slug($profil->judul);
        });
        static::updating(function ($profil) {
            $profil->slug = Str::slug($profil->judul);
        });
    }
}