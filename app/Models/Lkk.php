<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lkk extends Model
{
  protected $fillable = ['kategori', 'nama_lembaga', 'foto', 'deskripsi', 'konten_detail'];
}
