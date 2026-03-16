@extends('layouts.admin') 

@section('content')
<div class="p-8">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Update Statistik & Profil</h1>
            <p class="text-gray-500 text-sm">Kelola data demografi dan foto wilayah yang tampil di halaman profil.</p>
        </div>
        <div class="bg-[#007F5F]/10 text-[#007F5F] px-4 py-2 rounded-lg text-xs font-bold uppercase">
            Data Terakhir: {{ $statistik->updated_at ? $statistik->updated_at->format('d M Y') : 'Belum ada' }}
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-500 text-white rounded-xl shadow-lg shadow-emerald-200 flex items-center gap-3 animate-pulse">
        <i class="fa fa-check-circle"></i>
        <span class="text-sm font-bold">{{ session('success') }}</span>
    </div>
    @endif

    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
        {{-- WAJIB MENGGUNAKAN enctype="multipart/form-data" UNTUK UPLOAD FILE --}}
        <form action="{{ route('admin.statistik.update') }}" method="POST" enctype="multipart/form-data" class="p-8 md:p-12">
            @csrf
            @method('PUT')

            <div class="mb-10">
                <h3 class="text-sm font-black text-[#007F5F] uppercase tracking-widest mb-6 border-l-4 border-[#007F5F] pl-3">Data Demografi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Jumlah Penduduk</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400"><i class="fa fa-users"></i></span>
                            <input type="text" name="jml_penduduk" value="{{ old('jml_penduduk', $statistik->jml_penduduk) }}" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none font-bold text-gray-700">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Luas Wilayah (Ha)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400"><i class="fa fa-map-marked-alt"></i></span>
                            <input type="text" name="luas_wilayah" value="{{ old('luas_wilayah', $statistik->luas_wilayah) }}" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none font-bold text-gray-700">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Total RW</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400"><i class="fa fa-home"></i></span>
                            <input type="text" name="jml_rw" value="{{ old('jml_rw', $statistik->jml_rw) }}" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none font-bold text-gray-700">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest ml-1">Total RT</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400"><i class="fa fa-users-rectangle"></i></span>
                            <input type="text" name="jml_rt" value="{{ old('jml_rt', $statistik->jml_rt) }}" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] outline-none font-bold text-gray-700">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-black text-[#007F5F] uppercase tracking-widest mb-6 border-l-4 border-[#007F5F] pl-3">Foto Profil Wilayah</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="space-y-4 p-6 bg-gray-50 rounded-[1.5rem] border border-gray-100">
                        <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest">Foto Kantor Kelurahan</label>
                        
                        @if($statistik->gambar_kantor)
                            <div class="relative w-full h-40 rounded-xl overflow-hidden shadow-sm mb-4">
                                <img src="{{ asset('storage/' . $statistik->gambar_kantor) }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <span class="text-white text-xs font-bold uppercase">Foto Saat Ini</span>
                                </div>
                            </div>
                        @endif

                        <input type="file" name="gambar_kantor" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-[#007F5F] file:text-white hover:file:bg-black transition-all">
                        <p class="text-[10px] text-gray-400 mt-2">* Format: JPG, PNG. Maksimal 2MB.</p>
                    </div>

                    <div class="space-y-4 p-6 bg-gray-50 rounded-[1.5rem] border border-gray-100">
                        <label class="block text-[11px] font-black text-gray-500 uppercase tracking-widest">Foto Wilayah / Lingkungan</label>
                        
                        @if($statistik->gambar_wilayah)
                            <div class="relative w-full h-40 rounded-xl overflow-hidden shadow-sm mb-4">
                                <img src="{{ asset('storage/' . $statistik->gambar_wilayah) }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <span class="text-white text-xs font-bold uppercase">Foto Saat Ini</span>
                                </div>
                            </div>
                        @endif

                        <input type="file" name="gambar_wilayah" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-[#007F5F] file:text-white hover:file:bg-black transition-all">
                        <p class="text-[10px] text-gray-400 mt-2">* Format: JPG, PNG. Maksimal 2MB.</p>
                    </div>

                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-50 flex justify-end">
                <button type="submit" class="group flex items-center gap-3 px-10 py-4 bg-[#007F5F] hover:bg-black text-white rounded-2xl font-bold transition-all shadow-lg shadow-[#007F5F]/20 hover:-translate-y-1">
                    <i class="fa fa-save group-hover:rotate-12 transition-transform"></i>
                    SIMPAN SEMUA PERUBAHAN
                </button>
            </div>
        </form>
    </div>

    <div class="mt-8 bg-[#E6F4F1] p-6 rounded-2xl border border-[#007F5F]/10 flex items-start gap-4">
        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#007F5F] flex-none shadow-sm">
            <i class="fa fa-lightbulb"></i>
        </div>
        <div>
            <h4 class="font-bold text-gray-800 text-sm uppercase">Saran Tampilan</h4>
            <p class="text-xs text-gray-500 leading-relaxed mt-1">
                Untuk hasil terbaik pada halaman profil, gunakan foto dengan orientasi <strong>Landscape (Persegi Panjang)</strong> agar tidak terpotong secara otomatis oleh sistem.
            </p>
        </div>
    </div>
</div>
@endsection