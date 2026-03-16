<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    // 1. UNTUK USER: Halaman Utama Berita dengan Fitur Kategori
    public function index(Request $request)
    {
        $kategori_aktif = $request->query('kategori');
        $query = Berita::latest();

        // Jika user mengklik kategori tertentu
        if ($kategori_aktif) {
            $query->where('kategori', $kategori_aktif);
        }

        $berita = $query->get();
        
        // Daftar kategori tetap sesuai permintaanmu
        $daftar_kategori = ['Pengumuman', 'Kegiatan', 'Pemerintahan'];

        return view('berita.index', compact('berita', 'daftar_kategori', 'kategori_aktif'));
    }

    // 2. UNTUK USER: Halaman Detail Berita & Rekomendasi
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Fitur Tambahan: Ambil 3 berita lainnya dengan kategori yang sama (Rekomendasi)
        $rekomendasi = Berita::where('kategori', $berita->kategori)
                            ->where('id', '!=', $berita->id)
                            ->limit(3)
                            ->get();

        return view('berita.show', compact('berita', 'rekomendasi'));
    }

    // 3. UNTUK ADMIN: Tabel Manajemen
    public function indexAdmin()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    // 4. Menampilkan Form Tambah
    public function create()
    {
        return view('berita.create');
    }

    // 5. Simpan Berita Baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_publish' => 'required|date'
        ]);

        $data = $request->all();
        // Slug dibuat unik dengan tambahan waktu
        $data['slug'] = Str::slug($request->judul) . '-' . time();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $nama_gambar);
            $data['gambar'] = $nama_gambar; 
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 6. Menampilkan Form Edit
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    // 7. Update Berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_publish' => 'required|date'
        ]);

        $data = $request->all();
        // Slug update tetap menggunakan ID agar URL tidak berubah drastis
        $data['slug'] = Str::slug($request->judul) . '-' . $berita->id;

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ganti gambar
            if (File::exists(public_path('uploads/berita/' . $berita->gambar))) {
                File::delete(public_path('uploads/berita/' . $berita->gambar));
            }

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 8. Hapus Berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if (File::exists(public_path('uploads/berita/' . $berita->gambar))) {
            File::delete(public_path('uploads/berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}