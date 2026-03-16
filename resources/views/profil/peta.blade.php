@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="opacity-70">Profil</span>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Peta Kelurahan</span>
    </div>
</div>

<<div class="bg-[#F2FCF7] min-h-screen py-16 font-sans">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-10 flex flex-col lg:flex-row gap-10">
        
        <div class="lg:w-[70%] bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 md:p-12">
            
            <div class="mb-10 border-b border-gray-100 pb-8">
                <h2 class="text-3xl md:text-4xl font-black text-gray-800 tracking-tight uppercase mb-4">
                    Peta Wilayah Kelurahan
                </h2>
                <p class="text-gray-500 text-[15px] md:text-[17px] leading-relaxed">
                    Lokasi dan tata letak geografis Kelurahan Pringrejo, Kecamatan Pekalongan Barat, Kota Pekalongan.
                </p>
            </div>

            <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] relative group mb-10">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8814132390066!2d109.65249997504355!3d-6.9047817930945685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e702698ffbb3f2b%3A0xe7014b569450d301!2sKantor%20Kelurahan%20Pringrejo!5e0!3m2!1sid!2sid!4v1772745565276!5m2!1sid!2sid" class="w-full h-[400px] md:h-[500px] transition-transform duration-700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="bg-[#E6F4F1] border border-[#007F5F]/10 p-6 md:p-8 rounded-2xl flex flex-col md:flex-row items-center gap-6">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center flex-none shadow-sm">
                    <i class="fa fa-map-marker-alt text-2xl text-[#007F5F]"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800 text-lg mb-2">Kantor Kelurahan Pringrejo</h3>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                        Jl. Merpati No.1, Kel. Pringrejo, Kecamatan Pekalongan Barat, Kota Pekalongan, Jawa Tengah 51111.
                    </p>
                </div>
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