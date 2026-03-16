<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LkkSeeder extends Seeder
{
    public function run()
{
    $categories = [
        ['kategori' => 'pkk', 'nama' => 'PKK'],
        ['kategori' => 'lpm', 'nama' => 'LPM'],
        ['kategori' => 'bkm', 'nama' => 'BKM'],
        ['kategori' => 'karang-taruna', 'nama' => 'Karang Taruna'],
        ['kategori' => 'rtrw', 'nama' => 'RT / RW'],
        ['kategori' => 'posyandu', 'nama' => 'Posyandu'],
    ];

    foreach ($categories as $c) {
        \App\Models\Lkk::create([
            'kategori' => $c['kategori'],
            'nama_lembaga' => $c['nama'],
            'deskripsi' => 'Deskripsi singkat untuk lembaga ' . $c['nama'],
            'konten_detail' => '<p>Isi detail profil untuk ' . $c['nama'] . '</p>',
        ]);
    }
}
}
