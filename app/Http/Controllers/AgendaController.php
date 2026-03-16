<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // 1A. Tampilan untuk Warga (Halaman Depan Agenda)
    public function index()
    {
        // Hanya ambil maksimal 3 agenda terdekat menggunakan take(3)
        $agenda = Agenda::whereDate('tanggal_pelaksanaan', '>=', date('Y-m-d'))
                        ->orderBy('tanggal_pelaksanaan', 'asc')
                        ->take(3)
                        ->get();
        return view('agenda.index', compact('agenda'));
    }

    // 1B. Tampilan Semua Agenda Warga (Dilengkapi Pagination)
    public function semua()
    {
        // Mengambil seluruh agenda, diurutkan dari yang terbaru dengan fitur halaman (10 per halaman)
        $agenda = Agenda::orderBy('tanggal_pelaksanaan', 'desc')->paginate(10);
        return view('agenda.semua', compact('agenda'));
    }

    // 1C. Tampilan Detail Agenda
    public function show($id)
    {
        // Menampilkan detail spesifik dari satu agenda
        $agenda = Agenda::findOrFail($id);
        return view('agenda.show', compact('agenda'));
    }

    // 2. Tampilan Tabel Kelola (Admin)
    public function indexAdmin()
    {
        $agenda = Agenda::orderBy('tanggal_pelaksanaan', 'desc')->get();
        return view('admin.agenda.index', compact('agenda'));
    }

    // 3. Form Tambah
    public function create()
    {
        return view('agenda.create'); 
    }

    // 4. Proses Simpan
    public function store(Request $request)
    {
        // Sesuaikan validasi dengan database
        $request->validate([
            'nama_kegiatan'       => 'required|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'lokasi'              => 'required|max:255',
            'deskripsi'           => 'required'
        ]);

        Agenda::create($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda kegiatan berhasil ditambahkan!');
    }

    // 5. Form Edit
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit', compact('agenda'));
    }

    // 6. Proses Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan'       => 'required|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'lokasi'              => 'required|max:255',
            'deskripsi'           => 'required'
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($request->all());

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda kegiatan berhasil diperbarui!');
    }

    // 7. Proses Hapus
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
}