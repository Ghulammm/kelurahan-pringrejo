@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Galeri Foto</span>
    </div>
</div>

<div class="max-w-7xl mx-auto px-12 py-14">
    <div class="text-center mb-12">
        <h2 class="text-[32px] font-bold border-b-4 border-[#007F5F] inline-block pb-3.5 leading-tight tracking-tight">Galeri Kelurahan</h2>
        <p class="text-gray-700 text-[17px] mt-6 leading-relaxed max-w-2xl mx-auto">
            Dokumentasi kegiatan, infrastruktur, dan momen penting di lingkungan Kelurahan Pringrejo.
        </p>
    </div>

    <div class="flex flex-wrap justify-center gap-3.5 mb-14">
        <a href="{{ route('galeri.index') }}" 
           class="px-7 py-2.5 rounded-full shadow-sm font-semibold text-sm transition-all duration-300 border-2 {{ !$kategori_aktif ? 'bg-[#007F5F] text-white border-[#007F5F]' : 'bg-white border-gray-100 text-gray-600 hover:border-[#007F5F] hover:text-[#007F5F]' }}">
            Semua Foto
        </a>

        @foreach($daftar_kategori as $kat)
        <a href="{{ route('galeri.index', ['kategori' => $kat]) }}" 
           class="px-7 py-2.5 rounded-full shadow-sm font-semibold text-sm transition-all duration-300 border-2 {{ $kategori_aktif == $kat ? 'bg-[#007F5F] text-white border-[#007F5F]' : 'bg-white border-gray-100 text-gray-600 hover:border-[#007F5F] hover:text-[#007F5F]' }}">
            {{ $kat }}
        </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($galeri as $item)
        <div onclick="openLightbox('{{ asset('uploads/galeri/' . $item->file_gambar) }}', '{{ addslashes($item->judul_foto) }}')" 
             class="relative group overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 h-80 cursor-pointer">
             
            <img src="{{ asset('uploads/galeri/' . $item->file_gambar) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="{{ $item->judul_foto }}">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
            
            <div class="absolute top-5 right-5 bg-black/50 text-white text-[10px] font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 backdrop-blur-sm uppercase tracking-widest">
                <i class="fa fa-search-plus text-xs"></i> Perbesar
            </div>

            <div class="absolute bottom-6 left-6 right-6 text-white z-10">
                <h3 class="text-xl font-bold leading-tight mb-3 transition-transform duration-300 group-hover:-translate-y-2">
                    {{ $item->judul_foto }}
                </h3>
                
                <div class="flex items-center gap-3 text-sm opacity-90 transition-opacity duration-300 group-hover:opacity-100">
                    <span class="flex items-center gap-2 text-[11px] font-bold tracking-wider">
                        <i class="fa fa-calendar-alt text-[#FFCC00] text-xs"></i> 
                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                    </span>
                    <span class="w-1.5 h-1.5 bg-white/50 rounded-full"></span>
                    <span class="uppercase tracking-widest text-[10px] font-bold px-2.5 py-1 bg-white/20 rounded-md backdrop-blur-sm">
                        {{ $item->kategori }}
                    </span>
                </div>
                
                @if($item->deskripsi)
                <div class="h-0 overflow-hidden group-hover:h-auto group-hover:mt-3 transition-all duration-300">
                    <p class="text-xs text-gray-300 line-clamp-2">{{ $item->deskripsi }}</p>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-20 bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200">
            <i class="fa fa-camera-retro text-6xl text-gray-300 mb-6 block"></i>
            <h3 class="text-xl font-bold text-gray-600 mb-2 uppercase tracking-widest">Belum Ada Foto</h3>
            <p class="text-gray-500 max-w-sm mx-auto font-medium">Belum ada dokumentasi yang diunggah untuk kategori ini. Silakan kembali lagi nanti.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-16 flex justify-center">
        @if ($galeri->hasPages())
            <div class="bg-white px-4 py-2 rounded-2xl shadow-sm border border-gray-100 inline-flex items-center">
                {{ $galeri->links() }}
            </div>
        @endif
    </div>
</div>

<div id="lightbox" class="fixed inset-0 z-[100] hidden bg-black/95 backdrop-blur-md flex items-center justify-center transition-opacity duration-300 opacity-0" onclick="closeLightbox()">
    
    <button class="absolute top-6 right-8 text-white hover:text-red-500 transition-colors z-[110] outline-none">
        <i class="fa fa-times text-4xl"></i>
    </button>
    
    <div class="relative max-w-6xl w-full px-4 flex flex-col items-center justify-center transform scale-95 transition-transform duration-300" id="lightbox-content" onclick="event.stopPropagation()">
        
        <img id="lightbox-img" src="" class="max-h-[80vh] max-w-full rounded-xl shadow-2xl object-contain border border-white/10">
        
        <div class="mt-6 text-center">
            <h3 id="lightbox-caption" class="text-white text-xl md:text-2xl font-bold tracking-wide"></h3>
        </div>
    </div>
</div>

<script>
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxContent = document.getElementById('lightbox-content');

    // Buka Lightbox
    function openLightbox(imageSrc, caption) {
        lightboxImg.src = imageSrc;
        lightboxCaption.textContent = caption;
        
        // Tampilkan elemen dengan animasi
        lightbox.classList.remove('hidden');
        
        // Timeout kecil agar transisi CSS berjalan
        setTimeout(() => {
            lightbox.classList.remove('opacity-0');
            lightboxContent.classList.remove('scale-95');
            lightboxContent.classList.add('scale-100');
        }, 10);
    }

    // Tutup Lightbox
    function closeLightbox() {
        // Efek memudar
        lightbox.classList.add('opacity-0');
        lightboxContent.classList.remove('scale-100');
        lightboxContent.classList.add('scale-95');
        
        // Sembunyikan elemen setelah animasi selesai (300ms)
        setTimeout(() => {
            lightbox.classList.add('hidden');
            lightboxImg.src = ''; // Bersihkan src gambar
        }, 300);
    }

    // Tutup lightbox jika user menekan tombol 'Escape' (ESC) di keyboard
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape" && !lightbox.classList.contains('hidden')) {
            closeLightbox();
        }
    });
</script>
@endsection