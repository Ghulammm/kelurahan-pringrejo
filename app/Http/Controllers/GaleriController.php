<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class GaleriController extends Controller
{
    // 1. UNTUK USER: Halaman Galeri Publik (DENGAN FILTER & PAGINATION)
    public function index(Request $request)
    {
        // Ambil kategori dari URL jika ada (misal: ?kategori=Kegiatan)
        $kategori_aktif = $request->query('kategori');
        
        $query = Galeri::latest();

        // Filter berdasarkan kategori jika tombol diklik
        if ($kategori_aktif) {
            $query->where('kategori', $kategori_aktif);
        }

        // PERBAIKAN: Menggunakan paginate(3) agar maksimal tampil 3 foto per halaman.
        // withQueryString() memastikan filter kategori tetap aktif saat pindah halaman.
        $galeri = $query->paginate(3)->withQueryString();
        
        // Daftar kategori sesuai yang ada di form input Admin
        $daftar_kategori = ['Kegiatan', 'Infrastruktur', 'Pemerintahan'];

        return view('galeri.index', compact('galeri', 'daftar_kategori', 'kategori_aktif'));
    }

    // 2. UNTUK ADMIN: Halaman Tabel Kelola Galeri
    public function indexAdmin()
    {
        // Untuk admin biarkan pakai get() atau paginate yang lebih banyak agar mudah dikelola
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    // 3. Menampilkan Form Tambah Foto
    public function create()
    {
        return view('galeri.create'); 
    }

    // 4. Memproses Simpan Foto
    public function store(Request $request)
    {
        // Validasi ditambahkan 'deskripsi' agar sesuai dengan Model
        $request->validate([
            'judul_foto'  => 'required|max:255',
            'kategori'    => 'required',
            'deskripsi'   => 'nullable|string', // Boleh kosong, tapi harus terbaca sistem
            'file_gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Proses Upload Gambar
        if ($request->hasFile('file_gambar')) {
            $gambar = $request->file('file_gambar');
            $nama_gambar = time() . '_galeri_' . $gambar->getClientOriginalName();
            
            // Simpan ke folder public/uploads/galeri
            $gambar->move(public_path('uploads/galeri'), $nama_gambar);
            $data['file_gambar'] = $nama_gambar;
        }

        // Simpan ke Database
        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambah ke galeri!');
    }

    // 5. Memproses Hapus Foto
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus fisik file gambar dari folder laptop/hosting agar tidak menumpuk
        if (File::exists(public_path('uploads/galeri/' . $galeri->file_gambar))) {
            File::delete(public_path('uploads/galeri/' . $galeri->file_gambar));
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}