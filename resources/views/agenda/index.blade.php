@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Kegiatan</span>
    </div>
</div>
<div class="bg-[#F2FCF7] min-h-screen py-10 lg:py-16 font-sans">
    
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="flex flex-col lg:flex-row gap-10">
            
            <div class="lg:w-[65%]">
                
                <div class="mb-8 border-b border-gray-200 pb-4">
                    <h2 class="text-[28px] font-bold text-gray-900 tracking-tight">Agenda Mendatang</h2>
                </div>

                <div class="flex flex-col gap-6">
                    @forelse($agenda as $item)
                    <div class="bg-white rounded-xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden flex flex-col sm:flex-row transition-transform hover:-translate-y-1 duration-300">
                        
                        <div class="bg-[#007F5F] text-white w-full sm:w-40 flex flex-col items-center justify-center py-8 sm:py-0 flex-none">
                            <span class="text-[40px] font-extrabold leading-none">{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('d') }}</span>
                            <span class="text-sm font-bold uppercase tracking-widest mt-1">{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('F') }}</span>
                            <span class="text-sm font-bold mt-1">{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('Y') }}</span>
                        </div>

                        <div class="p-7 flex flex-col justify-between w-full">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">{{ $item->nama_kegiatan }}</h3>
                                
                                <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-[13px] font-medium text-gray-500 mb-4">
                                    <span class="flex items-center gap-1.5">
                                        <i class="fa fa-clock text-[#F59E0B] text-sm"></i> 
                                        {{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('H:i') }} - Selesai WIB
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <i class="fa fa-map-marker-alt text-[#F59E0B] text-sm"></i> 
                                        {{ $item->lokasi }}
                                    </span>
                                </div>

                                <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>

                            <div class="mt-5">
                                <a href="{{ route('agenda.show', $item->id) }}" class="inline-block px-5 py-2 border-2 border-[#007F5F] text-[#007F5F] font-bold text-sm rounded-lg hover:bg-[#007F5F] hover:text-white transition-colors">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-10 text-center">
                        <i class="fa fa-calendar-times text-5xl text-gray-300 mb-4 block"></i>
                        <p class="text-gray-500 font-medium">Belum ada agenda yang dijadwalkan.</p>
                    </div>
                    @endforelse
                </div>

                @if(count($agenda) > 0)
                <div class="mt-8 flex justify-center lg:justify-start">
                    <a href="{{ route('agenda.semua') }}" class="bg-[#007F5F] text-white px-6 py-3 rounded-lg font-bold text-sm shadow-md hover:bg-[#00664B] transition-colors flex items-center gap-2">
                        <i class="fa fa-calendar-alt"></i> Lihat Semua Agenda
                    </a>
                </div>
                @endif
                
            </div>

            <div class="lg:w-[35%]">
                <div class="bg-white rounded-2xl shadow-[0_2px_20px_-3px_rgba(0,0,0,0.05)] border border-gray-100 p-8 sticky top-10">
                    
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Kegiatan Rutin</h3>
                    <p class="text-sm text-gray-500 mb-8 pb-6 border-b border-gray-100 leading-relaxed">
                        Jadwal kegiatan rutin bulanan yang diselenggarakan secara reguler.
                    </p>

                    <div class="relative border-l border-gray-200 ml-3">
                        
                        <div class="mb-8 ml-6 relative">
                            <span class="absolute w-3.5 h-3.5 rounded-full ring-4 ring-white bg-white border-[3px] border-[#007F5F] -left-[31.5px] top-1"></span>
                            <span class="bg-[#E6F4F1] text-[#007F5F] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Minggu Ke-1</span>
                            <h4 class="font-bold text-gray-900 mt-3 text-base">Rapat Koordinasi LKK</h4>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">Evaluasi program kerja bersama LPM, RT/RW, Karang Taruna, dan PKK.</p>
                        </div>

                        <div class="mb-8 ml-6 relative">
                            <span class="absolute w-3.5 h-3.5 rounded-full ring-4 ring-white bg-white border-[3px] border-[#007F5F] -left-[31.5px] top-1"></span>
                            <span class="bg-[#E6F4F1] text-[#007F5F] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Minggu Ke-2</span>
                            <h4 class="font-bold text-gray-900 mt-3 text-base">Posyandu Lansia</h4>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">Cek kesehatan gratis meliputi tensi, gula darah, dan senam sehat bersama.</p>
                        </div>

                        <div class="mb-8 ml-6 relative">
                            <span class="absolute w-3.5 h-3.5 rounded-full ring-4 ring-white bg-white border-[3px] border-[#007F5F] -left-[31.5px] top-1"></span>
                            <span class="bg-[#E6F4F1] text-[#007F5F] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Minggu Ke-3</span>
                            <h4 class="font-bold text-gray-900 mt-3 text-base">Jumat Bersih</h4>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">Kerja bakti pembersihan selokan dan fasilitas umum bergilir tiap RW.</p>
                        </div>

                        <div class="ml-6 relative">
                            <span class="absolute w-3.5 h-3.5 rounded-full ring-4 ring-white bg-white border-[3px] border-[#007F5F] -left-[31.5px] top-1"></span>
                            <span class="bg-[#E6F4F1] text-[#007F5F] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">Minggu Ke-4</span>
                            <h4 class="font-bold text-gray-900 mt-3 text-base">Pembinaan KWT</h4>
                            <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">Pelatihan Kelompok Wanita Tani untuk pemanfaatan lahan pekarangan rumah.</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection