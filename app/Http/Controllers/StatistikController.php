<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib tambah ini untuk urusan file

class StatistikController extends Controller
{
    public function index()
    {
        $statistik = Statistik::first() ?? new Statistik();
        return view('admin.statistik.index', compact('statistik'));
    }

    public function update(Request $request)
    {
        // 1. Validasi Input (Tambahkan validasi gambar)
        $request->validate([
            'jml_penduduk'   => 'required',
            'luas_wilayah'   => 'required',
            'jml_rw'         => 'required',
            'jml_rt'         => 'required',
            'gambar_kantor'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_wilayah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $statistik = Statistik::first();
        
        // Ambil semua input teks
        $data = $request->only(['jml_penduduk', 'luas_wilayah', 'jml_rw', 'jml_rt']);

        // 2. Logika Upload Gambar Kantor
        if ($request->hasFile('gambar_kantor')) {
            // Hapus foto lama jika ada di storage
            if ($statistik && $statistik->gambar_kantor) {
                Storage::disk('public')->delete($statistik->gambar_kantor);
            }
            // Simpan foto baru ke folder 'profil' di storage/app/public
            $data['gambar_kantor'] = $request->file('gambar_kantor')->store('profil', 'public');
        }

        // 3. Logika Upload Gambar Wilayah
        if ($request->hasFile('gambar_wilayah')) {
            // Hapus foto lama jika ada
            if ($statistik && $statistik->gambar_wilayah) {
                Storage::disk('public')->delete($statistik->gambar_wilayah);
            }
            $data['gambar_wilayah'] = $request->file('gambar_wilayah')->store('profil', 'public');
        }

        // 4. Eksekusi Simpan/Update
        if ($statistik) {
            $statistik->update($data);
        } else {
            Statistik::create($data);
        }

        return redirect()->back()->with('success', 'Data & Foto berhasil diperbarui!');
    }
}