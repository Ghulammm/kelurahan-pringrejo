<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Pringrejo - Kota Pekalongan</title>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        .nav-link { 
            position: relative; 
            transition: all 0.3s;
            color: white;
            text-decoration: none;
            white-space: nowrap;
        }
        /* Efek garis bawah putih untuk menu aktif atau hover */
        .nav-link.active::after, .nav-link:hover::after {
            content: '';
            position: absolute;
            bottom: -6px; /* Sedikit lebih turun karena font lebih besar */
            left: 0;
            width: 100%;
            height: 2px;
            background-color: white;
        }
    </style>
</head>
<body class="bg-[#F6FFFC]">

    <nav class="bg-[#007F5F] text-white shadow-md sticky top-0 z-50">
    <div class="max-w-[1550px] mx-auto px-10 h-22 py-5 flex items-center">
        
        <div class="flex-1 flex items-center gap-4">
            <img src="{{ asset('img/logopringrejo.png') }}" alt="Logo Pringrejo" class="h-12 w-auto">
        </div>

        <div class="flex-none">
            <ul class="flex items-center gap-10 text-sm font-bold uppercase tracking-wide">
                <li><a href="/" class="nav-link">BERANDA</a></li>
                
                <li class="relative group">
                    <a href="#" class="nav-link flex items-center gap-1.5 py-2 border-b-2 border-transparent hover:border-white transition-all">
                        PROFIL <i class="fa fa-chevron-down text-[11px] transition-transform group-hover:rotate-180"></i>
                    </a>
                    
                    <div class="absolute top-full left-0 mt-2 w-56 bg-white shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 flex flex-col overflow-hidden border border-gray-100 z-50">
                        <a href="{{ route('profil.peta') }}" class="px-5 py-3.5 text-[13px] font-bold text-gray-700 hover:bg-[#007F5F] hover:text-white transition-colors border-b border-gray-50 uppercase tracking-wide">
                            Peta Kelurahan
                        </a>
                        <a href="{{ route('profil.visimisi') }}" class="px-5 py-3.5 text-[13px] font-bold text-gray-700 hover:bg-[#007F5F] hover:text-white transition-colors border-b border-gray-50 uppercase tracking-wide">
                            Visi & Misi
                        </a>
                        <a href="{{ route('profil.demografi') }}" class="px-5 py-3.5 text-[13px] font-bold text-gray-700 hover:bg-[#007F5F] hover:text-white transition-colors border-b border-gray-50 uppercase tracking-wide text-left">
                            Demografi Wilayah
                        </a>
                        
                        @php
                            try {
                                $profils = \App\Models\Profil::orderBy('id', 'asc')->get();
                            } catch (\Exception $e) {
                                $profils = collect(); 
                            }
                        @endphp

                        @foreach($profils as $menu_profil)
                            <a href="{{ route('profil.show', $menu_profil->slug) }}" class="px-5 py-3.5 text-[13px] font-bold text-gray-700 hover:bg-[#007F5F] hover:text-white transition-colors border-b border-gray-50 last:border-0 uppercase tracking-wide">
                                {{ $menu_profil->judul }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li><a href="/berita" class="nav-link">BERITA</a></li>
                <li><a href="/galeri" class="nav-link">GAMBAR</a></li>
                <li><a href="https://ppid.pekalongankota.go.id/kanal-I417.html" target="_blank" class="nav-link text-center">KIP/PPID</a></li>

                <li class="relative group">
                    <a href="#" class="nav-link flex items-center gap-1.5 py-2 border-b-2 border-transparent hover:border-white transition-all">
                        LAYANAN <i class="fa fa-chevron-down text-[11px] transition-transform group-hover:rotate-180"></i>
                    </a>
                    
                    <div class="absolute top-full left-0 mt-2 w-56 bg-white shadow-[0_10px_40px_-10px_rgba(0,0,0,0.15)] rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 flex flex-col overflow-hidden border border-gray-100 z-50">
                        <a href="{{ route('pengaduan.index') }}" class="px-5 py-3.5 text-[13px] font-bold text-gray-700 hover:bg-[#007F5F] hover:text-white transition-colors border-b border-gray-50 last:border-0 uppercase tracking-wide">
                            Pengaduan Warga
                        </a>
                        </div>
                </li>

                <li><a href="/agenda" class="nav-link">KEGIATAN</a></li>
                <li><a href="/skm" class="nav-link">SKM</a></li>
                <li><a href="/lkk" class="nav-link">LKK</a></li>
            </ul>
        </div>

        <div class="flex-1 flex justify-end">
            <button class="w-11 h-11 flex items-center justify-center hover:bg-white/10 rounded-full transition-all text-white">
                <i class="fa fa-search text-xl"></i>
            </button>
        </div>

    </div>
</nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-[#191F2F] text-white pt-16 pb-8 px-10 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-10 gap-x-12 gap-y-10">
            <div class="col-span-1 md:col-span-3">
                <h3 class="font-bold text-xl mb-6 border-b-2 border-[#007F5F] inline-block pb-2">Tentang Kami</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Website resmi Pemerintah Kelurahan Pringrejo, Kota Pekalongan. 
                    Memberikan pelayanan digital terpadu untuk masyarakat.
                </p>
            </div>
            <div class="col-span-1 md:col-span-3">
                <h3 class="font-bold text-xl mb-6 border-b-2 border-[#007F5F] inline-block pb-2">Link Terkait</h3>
                <ul class="text-gray-400 text-sm space-y-3">
                    <li><a href="#" class="hover:text-white transition">Pemerintah Kota Pekalongan</a></li>
                    <li><a href="#" class="hover:text-white transition">Layanan Pengaduan SP4N</a></li>
                    <li><a href="#" class="hover:text-white transition">JDIH Kota Pekalongan</a></li>
                </ul>
            </div>
            <div class="col-span-1 md:col-span-4">
                <h3 class="font-bold text-xl mb-6 border-b-2 border-[#007F5F] inline-block pb-2">Kontak Kami</h3>
                <div class="space-y-4 text-sm text-gray-400">
                    <p class="flex items-start gap-3">
                        <i class="fa fa-map-marker-alt text-[#FFCC00] mt-1 text-lg"></i>
                        Jl. Merpati No.1, Kel. Pringrejo, Pekalongan Barat, 51111
                    </p>
                    <p class="flex items-center gap-3">
                        <i class="fa fa-phone-alt text-[#FFCC00] text-lg"></i>
                        (0285) 4411668
                    </p>
                </div>
                <div class="flex gap-4 mt-8">
                    <a href="#" class="w-11 h-11 rounded-full bg-white/5 flex items-center justify-center hover:bg-[#007F5F] transition-all"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-11 h-11 rounded-full bg-white/5 flex items-center justify-center hover:bg-[#007F5F] transition-all"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-11 h-11 rounded-full bg-white/5 flex items-center justify-center hover:bg-[#007F5F] transition-all"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-white/5 mt-16 pt-8 text-center text-[11px] text-gray-500 uppercase tracking-[0.3em]">
            &copy; {{ date('Y') }} PEMERINTAH KOTA PEKALONGAN - KELURAHAN PRINGREJO
        </div>
    </footer>

</body>
</html>