@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-5xl">
    <div class="mb-8">
        <a href="{{ route('admin.lkk.index') }}" class="text-[#007F5F] text-sm font-bold hover:underline">
            <i class="fa fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
        <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight mt-4">Edit Profil {{ $lkk->nama_lembaga }}</h1>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.lkk.update', $lkk->id) }}" method="POST" enctype="multipart/form-data" class="p-10 space-y-8">
            @csrf
            @method('PUT')

            <div class="space-y-3">
                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest">Nama Lengkap Lembaga</label>
                <input type="text" name="nama_lembaga" value="{{ $lkk->nama_lembaga }}" required 
                       class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none transition-all font-bold text-gray-700">
            </div>

            <div class="space-y-3">
                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest">Ringkasan Singkat (Muncul di Halaman Utama)</label>
                <textarea name="deskripsi" rows="3" required 
                          class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none transition-all font-bold text-gray-700">{{ $lkk->deskripsi }}</textarea>
            </div>

            <div class="space-y-3">
                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest">Foto Utama / Banner</label>
                @if($lkk->foto)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $lkk->foto) }}" class="w-48 h-32 object-cover rounded-2xl border">
                    </div>
                @endif
                <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:bg-[#E6F4F1] file:text-[#007F5F] hover:file:bg-[#007F5F] hover:file:text-white file:transition-all">
            </div>

            <div class="space-y-3">
                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest">Isi Profil Lengkap (Konten Detail)</label>
                <textarea name="konten_detail" id="editor" rows="10" required 
                          class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none transition-all font-medium text-gray-700">{{ $lkk->konten_detail }}</textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-5 bg-[#007F5F] text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-[#007F5F]/30 hover:bg-[#00664d] transition-all duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection