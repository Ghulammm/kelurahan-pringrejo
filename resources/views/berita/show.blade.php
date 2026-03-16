@extends('layouts.app') 

@section('content')
<div class="fixed top-0 left-0 w-full h-1 bg-gray-100 z-50">
    <div id="progress-bar" class="h-full bg-[#007F5F] w-0 transition-all duration-150"></div>
</div>

<div class="max-w-4xl mx-auto py-12 md:py-20 px-6">
    <nav class="mb-8">
        <a href="{{ route('berita.index') }}" class="group inline-flex items-center text-[#007F5F] font-bold text-sm tracking-wide transition-all">
            <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center mr-3 group-hover:bg-[#007F5F] group-hover:text-white transition-all">
                <i class="fa fa-arrow-left text-xs"></i>
            </div>
            Kembali ke Berita
        </a>
    </nav>

    <header class="mb-12">
        <div class="flex items-center gap-3 mb-6">
            <span class="bg-emerald-50 text-[#007F5F] px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-[0.2em] border border-emerald-100">
                {{ $berita->kategori }}
            </span>
            <span class="text-gray-300 text-xs font-bold">•</span>
            <span class="text-gray-500 text-xs font-bold uppercase tracking-widest">
                {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d M Y') }}
            </span>
        </div>
        
        <h1 class="text-4xl md:text-6xl font-black text-gray-900 leading-[1.1] tracking-tight mb-8">
            {{ $berita->judul }}
        </h1>

        <div class="flex items-center gap-4 py-6 border-y border-gray-100">
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500">
                P
            </div>
            <div>
                <p class="text-sm font-black text-gray-800 uppercase tracking-tighter">Admin Pringrejo</p>
                <p class="text-xs text-gray-400 font-medium italic">Kontributor Desa</p>
            </div>
        </div>
    </header>

    <div class="relative group mb-16">
        <div class="absolute -inset-4 bg-emerald-50/50 rounded-[3rem] -z-10 scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500"></div>
        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white bg-gray-50 aspect-video">
            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" 
                 class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700"
                 alt="{{ $berita->judul }}">
        </div>
    </div>

    <article class="relative">
        <div class="absolute -left-12 top-0 text-6xl text-emerald-100 font-serif pointer-events-none hidden lg:block">“</div>
        
        <div class="prose prose-lg md:prose-xl max-w-none text-gray-700 leading-relaxed font-medium whitespace-pre-line selection:bg-emerald-100">
            {!! $berita->konten !!}
        </div>
    </article>

    <div class="mt-20 pt-10 border-t border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <p class="text-sm text-gray-400 font-medium italic">
            &copy; {{ date('Y') }} Pemerintah Desa Pringrejo. Seluruh hak cipta dilindungi.
        </p>
        <div class="flex items-center gap-4">
            <span class="text-xs font-black text-gray-400 uppercase tracking-widest">Bagikan:</span>
            <button class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></button>
            <button class="w-10 h-10 rounded-xl bg-sky-50 text-sky-500 flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all"><i class="fab fa-twitter"></i></button>
            <button class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition-all"><i class="fab fa-whatsapp"></i></button>
        </div>
    </div>
</div>

<script>
    window.onscroll = function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("progress-bar").style.width = scrolled + "%";
    };
</script>
@endsection