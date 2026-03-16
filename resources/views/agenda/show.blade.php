@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-4xl mx-auto px-6">
        
        <a href="{{ route('agenda.index') }}" class="inline-flex items-center gap-2 text-[#007F5F] font-bold hover:text-emerald-800 transition-colors mb-8">
            <i class="fa fa-arrow-left"></i> Kembali ke Agenda
        </a>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-[#007F5F] px-10 py-12 text-white text-center">
                <span class="inline-block bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest mb-4 backdrop-blur-sm">
                    Detail Kegiatan
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-4">
                    {{ $agenda->nama_kegiatan }}
                </h1>
            </div>

            <div class="flex flex-col sm:flex-row border-b border-gray-100 divide-y sm:divide-y-0 sm:divide-x divide-gray-100 bg-gray-50/50">
                <div class="flex-1 p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-[#007F5F] flex items-center justify-center text-xl flex-none">
                        <i class="fa fa-calendar-alt"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tanggal Pelaksanaan</p>
                        <p class="font-bold text-gray-800">{{ \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan)->translatedFormat('l, d F Y') }}</p>
                    </div>
                </div>
                <div class="flex-1 p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xl flex-none">
                        <i class="fa fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Waktu</p>
                        <p class="font-bold text-gray-800">{{ \Carbon\Carbon::parse($agenda->tanggal_pelaksanaan)->format('H:i') }} - Selesai WIB</p>
                    </div>
                </div>
                <div class="flex-1 p-6 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xl flex-none">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Lokasi</p>
                        <p class="font-bold text-gray-800">{{ $agenda->lokasi }}</p>
                    </div>
                </div>
            </div>

            <div class="p-10">
                <h3 class="text-lg font-bold text-gray-800 mb-4 border-l-4 border-[#007F5F] pl-3">Deskripsi Kegiatan</h3>
                <div class="prose max-w-none text-gray-600 leading-relaxed text-justify">
                    {{-- Menggunakan nl2br agar enter (paragraf) di database terbaca --}}
                    {!! nl2br(e($agenda->deskripsi)) !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection