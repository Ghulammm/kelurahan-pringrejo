@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="opacity-70">Profil</span>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">{{ $profil->judul }}</span>
    </div>
</div>

<div class="bg-[#F2FCF7] min-h-screen py-16 font-sans">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-10 flex flex-col lg:flex-row gap-10">
        
        <div class="lg:w-[70%] bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 md:p-12">
            
            <div class="mb-10 border-b border-gray-100 pb-8">
                <h2 class="text-3xl md:text-4xl font-black text-gray-800 tracking-tight uppercase mb-4">
                    {{ $profil->judul }}
                </h2>
                </div>

            <div class="text-gray-700 leading-relaxed md:text-lg text-justify prose prose-emerald max-w-none">
                {!! $profil->konten !!}
            </div>

            <div class="mt-16 pt-8 border-t border-gray-100">
                <a href="/" class="inline-flex items-center gap-2 px-8 py-3 bg-gray-50 hover:bg-[#007F5F] text-gray-600 hover:text-white rounded-full font-bold text-sm transition-colors border border-gray-200 hover:border-[#007F5F]">
                    <i class="fa fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

        </div>

        <div class="lg:w-[30%]">
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 sticky top-32">
                <h3 class="font-black text-lg text-gray-800 tracking-wide uppercase border-b-2 border-[#007F5F] inline-block pb-2 mb-6">
                    BERITA TERBARU
                </h3>

                <div class="space-y-6">
                    @forelse($berita_terbaru as $berita)
                    <a href="{{ route('berita.show', $berita->slug) }}" class="flex items-center gap-4 group">
                        <div class="w-16 h-16 rounded-full overflow-hidden flex-none border border-gray-100">
                            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <h4 class="font-bold text-[13px] text-gray-800 leading-tight group-hover:text-[#007F5F] transition-colors line-clamp-2 uppercase">
                                {{ $berita->judul }}
                            </h4>
                            <p class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mt-1.5 flex items-center gap-1.5">
                                <i class="fa fa-clock text-[#007F5F]/70"></i> 
                                {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d M Y') }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <p class="text-sm text-gray-400 italic">Belum ada berita terbaru.</p>
                    @endforelse
                </div>

                <div class="mt-8 pt-6 border-t border-gray-50 text-center">
                    <a href="{{ route('berita.index') }}" class="text-[12px] font-bold text-[#007F5F] uppercase tracking-widest hover:underline">
                        Lihat Semua Berita <i class="fa fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection