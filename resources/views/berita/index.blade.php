@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Berita</span>
    </div>
</div>

<div class="max-w-[1550px] mx-auto px-10 py-16">
    
    <div class="text-center mb-12">
        <h2 class="text-[32px] font-bold border-b-4 border-[#007F5F] inline-block pb-3.5 leading-tight tracking-tight">
            Berita Kelurahan Pringrejo
        </h2>
        <p class="text-gray-700 text-[17px] mt-6 leading-relaxed max-w-2xl mx-auto">
            Informasi terbaru seputar kegiatan warga, pelayanan publik, dan pengumuman resmi.
        </p>
    </div>

    <div class="flex flex-wrap justify-center gap-3.5 mb-14">
        <a href="{{ route('berita.index') }}" 
           class="px-7 py-2.5 rounded-full shadow-sm font-semibold text-sm transition-all duration-300 border-2 {{ empty($kategori_aktif) ? 'bg-[#007F5F] text-white border-[#007F5F]' : 'bg-white border-gray-100 text-gray-600 hover:border-[#007F5F] hover:text-[#007F5F]' }}">
            Semua Berita
        </a>

        @foreach(['Pengumuman', 'Kegiatan', 'Pemerintahan'] as $kat)
        <a href="{{ route('berita.index', ['kategori' => $kat]) }}" 
           class="px-7 py-2.5 rounded-full shadow-sm font-semibold text-sm transition-all duration-300 border-2 {{ (isset($kategori_aktif) && $kategori_aktif == $kat) ? 'bg-[#007F5F] text-white border-[#007F5F]' : 'bg-white border-gray-100 text-gray-600 hover:border-[#007F5F] hover:text-[#007F5F]' }}">
            {{ $kat }}
        </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        @forelse($berita as $item)
        <div class="group bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col">
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" 
                     class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                     alt="{{ $item->judul }}">
                <div class="absolute top-4 left-4">
                    <span class="bg-black/60 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-lg uppercase tracking-widest">
                        {{ $item->kategori }}
                    </span>
                </div>
            </div>

            <div class="p-8 flex flex-col flex-1">
                <div class="flex items-center gap-3 text-gray-400 text-[11px] mb-4 font-bold uppercase tracking-[0.1em]">
                    <span class="flex items-center gap-1.5">
                        <i class="fa fa-calendar-alt text-[#007F5F]"></i> 
                        {{ \Carbon\Carbon::parse($item->tanggal_publish)->translatedFormat('d F Y') }}
                    </span>
                </div>
                
                <h3 class="text-xl font-extrabold text-gray-800 leading-tight mb-4 group-hover:text-[#007F5F] transition-colors line-clamp-2">
                    {{ $item->judul }}
                </h3>
                
                <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                    {{ Str::limit(strip_tags($item->konten), 120) }}
                </p>

                <div class="mt-auto pt-6 border-t border-gray-50">
                    <a href="{{ route('berita.show', $item->slug) }}" 
                       class="inline-flex items-center gap-2 text-[#007F5F] hover:text-[#00664B] font-black text-xs uppercase tracking-[0.2em] transition-all group">
                        BACA SELENGKAPNYA
                        <i class="fa fa-arrow-right text-[10px] transform group-hover:translate-x-2 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-24 bg-gray-50 rounded-[3rem] border-4 border-dashed border-gray-200">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                <i class="fa fa-newspaper text-4xl text-gray-200"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-400 uppercase tracking-[0.3em]">Belum Ada Berita</h3>
            <p class="text-gray-400 text-sm mt-2 font-medium">Silakan pilih kategori lain atau kembali lagi nanti.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-28 text-center">
        <div class="inline-block p-[2px] rounded-full bg-gradient-to-r from-[#007F5F] to-emerald-400 shadow-2xl hover:scale-105 transition-transform duration-500">
            <a href="https://pekalongankota.go.id/berita" target="_blank" 
               class="flex items-center gap-4 px-12 py-5 bg-white rounded-full text-[#007F5F] font-black text-sm tracking-widest hover:bg-transparent hover:text-white transition-all duration-500">
                <i class="fa fa-globe text-lg"></i>
                LIHAT BERITA KOTA PEKALONGAN
                <i class="fa fa-external-link-alt text-xs opacity-60"></i>
            </a>
        </div>
        <p class="text-gray-400 text-[10px] mt-6 font-bold uppercase tracking-[0.3em]">Portal Berita Resmi Pemerintah Kota Pekalongan</p>
    </div>

</div>
@endsection