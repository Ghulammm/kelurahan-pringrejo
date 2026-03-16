@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Lkk</span>
    </div>
</div>

<div class="bg-[#F2FCF7] min-h-screen py-16 lg:py-24 font-sans">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="text-center mb-16">
            <h2 class="text-[32px] font-bold border-b-4 border-[#007F5F] inline-block pb-3.5 leading-tight tracking-tight text-gray-900">
                Lembaga Kemasyarakatan Kelurahan
            </h2>
            <p class="text-gray-500 text-[15px] mt-6 leading-relaxed max-w-3xl mx-auto">
                LKK merupakan wadah partisipasi masyarakat yang bertugas sebagai mitra Pemerintah Kelurahan Pringrejo dalam ikut serta merencanakan, melaksanakan, dan mengendalikan pembangunan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-10 flex flex-col items-center text-center hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1">
                <div class="w-20 h-20 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-6">
                    <i class="fa fa-users text-3xl text-[#007F5F]"></i>
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-4 tracking-wide uppercase">PKK</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-8 flex-1">
                    Pemberdayaan Kesejahteraan Keluarga. Gerakan nasional dalam pembangunan masyarakat yang tumbuh dari bawah.
                </p>
                <a href="{{ route('lkk.show', 'pkk') }}" class="w-full py-3 px-6 border-2 border-[#007F5F] text-[#007F5F] font-bold text-xs rounded-full hover:bg-[#007F5F] hover:text-white transition-colors">
                    Lihat Profil PKK
                </a>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-10 flex flex-col items-center text-center hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1">
                <div class="w-20 h-20 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-6">
                    <i class="fa fa-handshake text-3xl text-[#007F5F]"></i>
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-4 tracking-wide uppercase">LPM</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-8 flex-1">
                    Lembaga Pemberdayaan Masyarakat. Bertugas menyusun rencana pembangunan secara partisipatif.
                </p>
                <a href="{{ route('lkk.show', 'lpm') }}" class="w-full py-3 px-6 border-2 border-[#007F5F] text-[#007F5F] font-bold text-xs rounded-full hover:bg-[#007F5F] hover:text-white transition-colors">
                    Lihat Profil LPM
                </a>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-10 flex flex-col items-center text-center hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1">
                <div class="w-20 h-20 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-6">
                    <i class="fa fa-building text-3xl text-[#007F5F]"></i>
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-4 tracking-wide uppercase">BKM</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-8 flex-1">
                    Badan Keswadayaan Masyarakat. Lembaga pimpinan kolektif penanggulangan kemiskinan.
                </p>
                <a href="{{ route('lkk.show', 'bkm') }}" class="w-full py-3 px-6 border-2 border-[#007F5F] text-[#007F5F] font-bold text-xs rounded-full hover:bg-[#007F5F] hover:text-white transition-colors">
                    Lihat Profil BKM
                </a>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-10 flex flex-col items-center text-center hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1">
                <div class="w-20 h-20 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-6">
                    <i class="fa fa-hand-fist text-3xl text-[#007F5F]"></i>
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-4 tracking-wide uppercase">Karang Taruna</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-8 flex-1">
                    Wadah pengembangan generasi muda kelurahan yang tumbuh atas dasar kesadaran sosial.
                </p>
                <a href="{{ route('lkk.show', 'karang-taruna') }}" class="w-full py-3 px-6 border-2 border-[#007F5F] text-[#007F5F] font-bold text-xs rounded-full hover:bg-[#007F5F] hover:text-white transition-colors">
                    Lihat Karang Taruna
                </a>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-10 flex flex-col items-center text-center hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1">
                <div class="w-20 h-20 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-6">
                    <i class="fa fa-map-location-dot text-3xl text-[#007F5F]"></i>
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-4 tracking-wide uppercase">RT / RW</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-8 flex-1">
                    Rukun Tetangga dan Rukun Warga. Pelayanan kemasyarakatan dan pelestarian gotong royong.
                </p>
                <a href="{{ route('lkk.show', 'rtrw') }}" class="w-full py-3 px-6 border-2 border-[#007F5F] text-[#007F5F] font-bold text-xs rounded-full hover:bg-[#007F5F] hover:text-white transition-colors">
                    Daftar Ketua RT/RW
                </a>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-10 flex flex-col items-center text-center hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] transition-all duration-300 hover:-translate-y-1">
                <div class="w-20 h-20 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-6">
                    <i class="fa fa-heart-pulse text-3xl text-[#007F5F]"></i>
                </div>
                <h3 class="text-lg font-black text-gray-900 mb-4 tracking-wide uppercase">Posyandu</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed mb-8 flex-1">
                    Pos Pelayanan Terpadu. Pusat kegiatan masyarakat dalam upaya pelayanan kesehatan.
                </p>
                <a href="{{ route('lkk.show', 'posyandu') }}" class="w-full py-3 px-6 border-2 border-[#007F5F] text-[#007F5F] font-bold text-xs rounded-full hover:bg-[#007F5F] hover:text-white transition-colors">
                    Jadwal & Lokasi
                </a>
            </div>

        </div>
    </div>
</div>
@endsection