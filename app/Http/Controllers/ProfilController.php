<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Berita; // WAJIB DITAMBAHKAN: Untuk mengambil data berita
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // --- HALAMAN PUBLIK (WARGA) ---
    public function show($slug)
    {
        // Mencari halaman profil berdasarkan slug di URL
        $profil = Profil::where('slug', $slug)->firstOrFail();
        
        // Mengambil 4 berita terbaru untuk sidebar di sebelah kanan
        $berita_terbaru = Berita::latest()->take(4)->get();

        // Melempar variabel $profil dan $berita_terbaru ke view
        return view('profil.show', compact('profil', 'berita_terbaru'));
    }

    // --- HALAMAN ADMIN ---
    public function indexAdmin()
    {
        $profils = Profil::all();
        return view('admin.profil.index', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required'
        ]);

        Profil::create($request->all());
        return redirect()->route('admin.profil.index')->with('success', 'Halaman Profil berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required'
        ]);

        $profil = Profil::findOrFail($id);
        $profil->update($request->all());
        
        return redirect()->route('admin.profil.index')->with('success', 'Halaman Profil berhasil diupdate!');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();
        return redirect()->route('admin.profil.index')->with('success', 'Halaman Profil berhasil dihapus!');
    }
}