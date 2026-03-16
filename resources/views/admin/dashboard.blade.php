@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-6">
        <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-500 text-2xl">
            <i class="fa fa-newspaper"></i>
        </div>
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Berita</p>
            <h3 class="text-3xl font-black text-gray-800">{{ \App\Models\Berita::count() }}</h3>
        </div>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-6">
        <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-500 text-2xl">
            <i class="fa fa-images"></i>
        </div>
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Galeri</p>
            <h3 class="text-3xl font-black text-gray-800">{{ \App\Models\Galeri::count() }}</h3>
        </div>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-6">
        <div class="w-16 h-16 rounded-2xl bg-amber-50 flex items-center justify-center text-amber-500 text-2xl">
            <i class="fa fa-calendar-alt"></i>
        </div>
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Agenda</p>
            <h3 class="text-3xl font-black text-gray-800">{{ \App\Models\Agenda::count() }}</h3>
        </div>
    </div>
    

</div>

<div class="mt-12 bg-[#007F5F] rounded-[2rem] p-10 text-white relative overflow-hidden shadow-2xl shadow-[#007F5F]/30">
    <div class="relative z-10 max-w-2xl">
        <h2 class="text-3xl font-black mb-4">Halo, Pengelola Website Pringrejo!</h2>
        <p class="text-emerald-100 leading-relaxed mb-8 font-medium">
            Gunakan panel ini untuk memperbarui informasi bagi warga. Pastikan setiap gambar yang diunggah berkualitas baik dan informasi yang diberikan akurat.
        </p>
        <div class="flex gap-4">
            <a href="/berita/create" class="bg-white text-[#007F5F] px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest shadow-lg hover:bg-emerald-50 transition-all">
                + Tulis Berita Baru
            </a>
            <a href="/galeri/create" class="bg-emerald-700 text-white px-6 py-3 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-emerald-800 transition-all">
                + Upload Foto
            </a>
        </div>
    </div>
    <i class="fa fa-shield-halved absolute -right-10 -bottom-10 text-white/10 text-[20rem]"></i>
</div>


@endsection