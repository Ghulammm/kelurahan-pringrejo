@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="opacity-70">Layanan</span>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Pusat Aduan & Darurat</span>
    </div>
</div>

<div class="bg-[#F2FCF7] min-h-screen py-20 font-sans">
    <div class="max-w-[1200px] mx-auto px-6">
        
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-[0.2em] mb-4 border border-red-100">
                Layanan Aduan Terintegrasi
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-gray-800 mb-4 uppercase tracking-tight">Butuh Bantuan?</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed text-[15px] md:text-[17px]">
                Sampaikan pengaduan Anda melalui kanal resmi Pemerintah Kota Pekalongan atau hubungi nomor darurat di bawah ini untuk penanganan cepat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <a href="https://pekalongankota.go.id" target="_blank" 
               class="group bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col items-center justify-center gap-6 hover:-translate-y-2 transition-all duration-500 hover:shadow-[#007F5F]/10">
                <div class="h-24 flex items-center justify-center">
                    <img src="{{ asset('img/logo-pemkot.png') }}" alt="Pemerintah Kota Pekalongan" class="max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                </div>
                <div class="text-center">
                    <h4 class="font-black text-xs text-gray-400 uppercase tracking-widest group-hover:text-[#007F5F]">Website Kota</h4>
                </div>
            </a>

            <a href="https://wa.me/62816644000" target="_blank" 
               class="group bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col items-center justify-center gap-6 hover:-translate-y-2 transition-all duration-500 hover:shadow-orange-200/50">
                <div class="h-32 flex items-center justify-center">
                    <img src="{{ asset('img/aaf-balgis.png') }}" alt="Aduan Rakyat Aaf Balgis" class="max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="text-center">
                    <span class="block px-3 py-1 bg-green-50 text-green-600 text-[9px] font-black rounded-full mb-2 border border-green-100 uppercase tracking-tighter">WhatsApp Lapor</span>
                    <h4 class="font-black text-xs text-gray-800 uppercase tracking-widest">Aaf - Balgis</h4>
                </div>
            </a>

            <a href="https://www.lapor.go.id/instansi/pemerintah-kota-pekalongan" target="_blank" 
               class="group bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col items-center justify-center gap-6 hover:-translate-y-2 transition-all duration-500 hover:shadow-red-200/50">
                <div class="h-24 flex items-center justify-center">
                    <img src="{{ asset('img/logo-lapor.png') }}" alt="Layanan Aspirasi dan Pengaduan Online Rakyat" class="max-h-full object-contain group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="text-center">
                    <h4 class="font-black text-xs text-gray-400 uppercase tracking-widest group-hover:text-red-600">Layanan Nasional</h4>
                </div>
            </a>

            <a href="tel:112" 
               class="group bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col items-center justify-center gap-6 hover:-translate-y-2 transition-all duration-500 hover:shadow-red-200/50 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4">
                    <span class="flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                </div>
                
                <div class="h-32 flex items-center justify-center">
                    <img src="{{ asset('img/112-emergency.png') }}" alt="Darurat 112" class="max-h-full object-contain group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="text-center">
                    <h4 class="font-black text-xs text-red-600 uppercase tracking-[0.2em]">Darurat Bebas Pulsa</h4>
                </div>
            </a>

        </div>

        <div class="mt-20 p-10 bg-[#007F5F] rounded-[3rem] text-white flex flex-col md:flex-row items-center gap-8 shadow-2xl shadow-[#007F5F]/20 relative overflow-hidden">
            <div class="absolute bottom-0 right-0 w-40 h-40 bg-white/5 rounded-full -mb-20 -mr-20"></div>
            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center flex-none">
                <i class="fa fa-info-circle text-3xl"></i>
            </div>
            <div>
                <h4 class="text-xl font-black uppercase tracking-tight">Kerahasiaan Terjamin</h4>
                <p class="text-white/80 leading-relaxed text-sm mt-1">Semua laporan yang Anda sampaikan melalui kanal resmi di atas akan dijaga kerahasiaan identitasnya dan ditindaklanjuti oleh instansi terkait dalam waktu 1x24 jam untuk kondisi darurat.</p>
            </div>
        </div>

    </div>
</div>
@endsection