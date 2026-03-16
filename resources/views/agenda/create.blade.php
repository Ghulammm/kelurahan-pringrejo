@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10 flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-500 text-xl">
            <i class="fa fa-calendar-plus"></i>
        </div>
        <div>
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Jadwalkan Agenda</h2>
            <p class="text-gray-400 text-sm">Input jadwal kegiatan yang akan datang.</p>
        </div>
    </div>

    <form action="{{ route('agenda.store') }}" method="POST" class="bg-white p-10 rounded-[2rem] shadow-sm border border-gray-100 space-y-6">
        @csrf
        <div>
            <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none" placeholder="Contoh: Rapat Pleno PKK">
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none">
            </div>
            <div>
                <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Lokasi</label>
                <input type="text" name="lokasi" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none" placeholder="Aula Kelurahan">
            </div>
        </div>

        <div>
            <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="4" required class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none" placeholder="Jelaskan detail singkat kegiatan..."></textarea>
        </div>

        <button type="submit" class="w-full bg-[#007F5F] text-white py-5 rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-[#00664B] transition-all">
            Simpan Jadwal
        </button>
    </form>
</div>
@endsection