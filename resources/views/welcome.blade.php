@extends('layouts.app')

@section('content')
<div class="relative pt-24 pb-48 overflow-hidden">
    <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg" alt="Background Pringrejo" class="absolute inset-0 w-full h-full object-cover object-center">
    
    <div class="absolute inset-0 bg-[#007F5F]/85 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#007F5F] to-transparent opacity-80"></div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <h1 class="text-2xl md:text-4xl lg:text-[40px] font-extrabold text-white tracking-tight mb-4 whitespace-normal lg:whitespace-nowrap">
            Selamat Datang di Kelurahan Pringrejo
        </h1>
        <p class="text-emerald-50 text-base md:text-lg font-medium mb-10">
            Portal Layanan Publik & Informasi Digital Terpadu
        </p>

        
    </div>
</div>

<div class="bg-[#F2FCF7] relative z-20 -mt-24 pb-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="bg-white rounded-3xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] p-10 border border-gray-100">
            
            <h3 class="text-center text-xl font-extrabold text-gray-800 tracking-widest uppercase mb-10">
                Layanan Populer
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="border border-gray-100 p-6 rounded-2xl hover:border-[#007F5F] hover:shadow-lg transition-all group cursor-pointer text-center">
                    <i class="fa fa-envelope-open-text text-3xl text-[#007F5F] mb-4 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-gray-800 mb-2">Info & Syarat Layanan</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Informasi jenis layanan dan standar operasional.</p>
                </div>
                <div class="border border-gray-100 p-6 rounded-2xl hover:border-[#007F5F] hover:shadow-lg transition-all group cursor-pointer text-center">
                    <a href="/skm">
                    <i class="fa fa-id-card-clip text-3xl text-[#007F5F] mb-4 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-gray-800 mb-2">Survei Kepuasan</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Isi survei singkat kepuasan masyarakat (SKM).</p>
                    </a>
                </div>
                <div class="border border-gray-100 p-6 rounded-2xl hover:border-[#007F5F] hover:shadow-lg transition-all group cursor-pointer text-center">
                    <a href="/pengaduan">
                    <i class="fa fa-comments text-3xl text-[#007F5F] mb-4 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-gray-800 mb-2">Prosedur Pengaduan</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Dokumen prosedur dan sarana pengaduan warga.</p>
                    </a>
                </div>
                <div class="border border-gray-100 p-6 rounded-2xl hover:border-[#007F5F] hover:shadow-lg transition-all group cursor-pointer text-center">
                    <a href="/agenda">
                    <i class="fa fa-stethoscope text-3xl text-[#007F5F] mb-4 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-gray-800 mb-2">Info Komunitas</h4>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Info kegiatan Posyandu, RT/RW, dan PKK.</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="bg-[#F2FCF7] py-10">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="flex items-end justify-between border-b-2 border-gray-200 pb-4 mb-8">
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-widest relative">
                Berita Terbaru
                <span class="absolute -bottom-[18px] left-0 w-1/2 h-[4px] bg-[#007F5F]"></span>
            </h2>
            <a href="{{ route('berita.index') }}" class="text-[#007F5F] font-bold text-xs uppercase hover:underline">Lihat Semua</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($berita_terbaru as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <span class="text-[#007F5F] text-[10px] font-bold uppercase tracking-widest flex items-center gap-1.5 mb-3">
                        <i class="fa fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                    </span>
                    <h3 class="font-bold text-gray-900 text-lg mb-4 line-clamp-2 leading-tight flex-1 group-hover:text-[#007F5F] transition-colors">
                        {{ $item->judul }}
                    </h3>
                    <a href="{{ route('berita.show', $item->slug) }}" class="text-[#007F5F] font-bold text-xs flex items-center gap-2 hover:gap-3 transition-all mt-auto">
                        Baca Selengkapnya <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<section class="py-12 bg-gray-50/50">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <div class="flex justify-between items-center border-b border-gray-300 pb-3 mb-8">
            <h2 class="text-xl font-bold text-gray-800 tracking-wide uppercase">Berita Kota</h2>
            <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="text-xs font-bold text-gray-400 hover:text-teal-600 transition tracking-wider uppercase flex items-center gap-1">
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
            
            <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="flex gap-4 group cursor-pointer items-start">
                <div class="w-36 h-24 shrink-0 overflow-hidden rounded shadow-sm">
                    <img src="https://picsum.photos/seed/p1/300/200" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-start">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-teal-600 transition line-clamp-3">Berkah Ramadan, WBP Rutan Pekalongan Terima Wakaf Al-Qur'an dari Yayasan Asysyamil</h3>
                    <p class="text-[10px] text-gray-500 mt-2 font-medium tracking-wide uppercase">5 MARET 2026 [15:21:23]</p>
                </div>
            </a>

            <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="flex gap-4 group cursor-pointer items-start">
                <div class="w-36 h-24 shrink-0 overflow-hidden rounded shadow-sm">
                    <img src="https://picsum.photos/seed/p2/300/200" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-start">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-teal-600 transition line-clamp-3">Bagikan Ribuan Takjil, HIMPAUDI Kota Pekalongan Ajak Anak-Anak Belajar Berbagi</h3>
                    <p class="text-[10px] text-gray-500 mt-2 font-medium tracking-wide uppercase">5 MARET 2026 [14:23:23]</p>
                </div>
            </a>

            <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="flex gap-4 group cursor-pointer items-start">
                <div class="w-36 h-24 shrink-0 overflow-hidden rounded shadow-sm">
                    <img src="https://picsum.photos/seed/p3/300/200" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-start">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-teal-600 transition line-clamp-3">DPUPR Kota Pekalongan Siap Tertibkan Kabel Fiber Optik Semrawut, Warga Diminta Ikut Mengawasi</h3>
                    <p class="text-[10px] text-gray-500 mt-2 font-medium tracking-wide uppercase">5 MARET 2026 [14:22:43]</p>
                </div>
            </a>

            <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="flex gap-4 group cursor-pointer items-start">
                <div class="w-36 h-24 shrink-0 overflow-hidden rounded shadow-sm">
                    <img src="https://picsum.photos/seed/p4/300/200" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-start">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-teal-600 transition line-clamp-3">RSUD Bendan Gelar Bazar UMKM Ramadan 2026, Sediakan Sembako Murah hingga Pakaian Layak Pakai</h3>
                    <p class="text-[10px] text-gray-500 mt-2 font-medium tracking-wide uppercase">5 MARET 2026 [14:14:42]</p>
                </div>
            </a>

            <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="flex gap-4 group cursor-pointer items-start">
                <div class="w-36 h-24 shrink-0 overflow-hidden rounded shadow-sm">
                    <img src="https://picsum.photos/seed/p5/300/200" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-start">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-teal-600 transition line-clamp-3">Pengawasan Takjil 2026: Temuan Formalin Nihil, Ditemukan Kasus Boraks</h3>
                    <p class="text-[10px] text-gray-500 mt-2 font-medium tracking-wide uppercase">5 MARET 2026 [11:31:46]</p>
                </div>
            </a>

             <a href="https://pekalongankota.go.id/berita-kota/index.html" target="_blank" class="flex gap-4 group cursor-pointer items-start">
                <div class="w-36 h-24 shrink-0 overflow-hidden rounded shadow-sm">
                    <img src="https://picsum.photos/seed/p6/300/200" alt="Berita" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-start">
                    <h3 class="font-bold text-gray-800 text-sm leading-snug group-hover:text-teal-600 transition line-clamp-3">Pemkot Pekalongan Lakukan Pendekatan Humanis dalam Penataan PKL Jelang Lebaran</h3>
                    <p class="text-[10px] text-gray-500 mt-2 font-medium tracking-wide uppercase">5 MARET 2026 [10:39:12]</p>
                </div>
            </a>

        </div>
    </div>
</section>

<div class="bg-[#F2FCF7] py-10 pb-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="flex items-end justify-between border-b-2 border-gray-200 pb-4 mb-8 relative">
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-widest relative">
                Galeri Foto
                <span class="absolute -bottom-[18px] left-0 w-1/2 h-[4px] bg-[#007F5F]"></span>
            </h2>
            <a href="{{ route('galeri.index') }}" class="text-[#007F5F] font-bold text-xs uppercase hover:underline">
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($galeri_terbaru as $foto)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all group flex flex-col h-full">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ asset('uploads/galeri/' . $foto->file_gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <span class="text-[#007F5F] text-[9px] font-black uppercase tracking-widest mb-2">{{ $foto->kategori }}</span>
                    <h3 class="font-bold text-gray-900 text-base mb-4 line-clamp-2 leading-tight flex-1 group-hover:text-[#007F5F] transition-colors">
                        {{ $foto->judul_foto }}
                    </h3>
                    <a href="{{ route('galeri.index') }}" class="text-[#007F5F] font-bold text-xs flex items-center gap-1.5 mt-auto hover:text-emerald-800 transition-colors">
                        Lihat Detail <i class="fa fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>


@endsection