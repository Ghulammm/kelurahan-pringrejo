<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Pastikan namespace File benar

class PengaduanController extends Controller
{
    /**
     * UNTUK WARGA: Menampilkan Form Pengaduan
     */
    public function index()
    {
        return view('layanan.pengaduan');
    }

    /**
     * UNTUK WARGA: Mengirim Aduan
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengadu' => 'required|string|max:255',
            'nik'          => 'required|digits:16',
            'judul_aduan'  => 'required|string|max:255',
            'isi_aduan'    => 'required',
            'foto_bukti'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ], [
            // Custom pesan error agar warga tidak bingung
            'nik.digits' => 'NIK harus berjumlah 16 digit.',
            'foto_bukti.max' => 'Ukuran foto maksimal adalah 2MB.'
        ]);

        $data = $request->except('_token');

        // PENGAMAN 1: Paksa status menjadi 'menunggu' jika tidak ada di request
        $data['status'] = 'menunggu';

        // PENGAMAN 2: Pastikan folder ada
        $path = public_path('uploads/pengaduan');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        if ($request->hasFile('foto_bukti')) {
            $file = $request->file('foto_bukti');
            $nama_file = time() . '_' . $file->getClientOriginalName();
            
            $file->move($path, $nama_file);
            $data['foto_bukti'] = $nama_file;
        }

        // Simpan ke database
        Pengaduan::create($data);

        return redirect()->back()->with('success', 'Aduan Anda telah terkirim dan akan segera kami proses.');
    }

    /**
     * UNTUK ADMIN: Daftar Aduan
     */
    public function indexAdmin()
    {
        // Gunakan \App\Models\Pengaduan untuk memastikan tidak salah panggil
        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    /**
     * UNTUK ADMIN: Update Status (Menunggu, Proses, Selesai)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai'
        ]);

        $aduan = Pengaduan::findOrFail($id);
        $aduan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status laporan berhasil diubah.');
    }

    /**
     * UNTUK ADMIN: Menghapus Aduan
     */
    public function destroy($id)
    {
        $aduan = Pengaduan::findOrFail($id);

        if ($aduan->foto_bukti) {
            $fotoPath = public_path('uploads/pengaduan/' . $aduan->foto_bukti);
            if (File::exists($fotoPath)) {
                File::delete($fotoPath);
            }
        }

        $aduan->delete();

        return redirect()->back()->with('success', 'Data pengaduan berhasil dihapus.');
    }
}