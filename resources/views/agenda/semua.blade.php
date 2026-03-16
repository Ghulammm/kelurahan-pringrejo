@extends('layouts.app')

@section('content')
<div class="bg-[#F2FCF7] min-h-screen py-12 font-sans">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 border-b border-gray-200 pb-6">
            <div>
                <a href="{{ route('agenda.index') }}" class="text-[#007F5F] text-sm font-bold flex items-center gap-2 mb-2 hover:underline">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Semua Agenda Kegiatan</h2>
                <p class="text-gray-500 mt-1">Daftar seluruh jadwal kegiatan Kelurahan Pringrejo</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($agenda as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col transition-all hover:shadow-md">
                <div class="bg-[#007F5F] p-4 text-white flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl font-black">{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('d') }}</span>
                        <div class="flex flex-col leading-none">
                            <span class="text-[10px] uppercase font-bold opacity-80">{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->translatedFormat('F') }}</span>
                            <span class="text-[10px] font-bold">{{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('Y') }}</span>
                        </div>
                    </div>
                    <div class="text-[11px] font-bold bg-white/20 px-3 py-1 rounded-full backdrop-blur-sm">
                        <i class="fa fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('H:i') }} WIB
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-bold text-gray-900 text-lg mb-3 line-clamp-2 h-14">
                        {{ $item->nama_kegiatan }}
                    </h3>
                    
                    <div class="flex items-start gap-2 text-gray-500 text-xs mb-4">
                        <i class="fa fa-map-marker-alt text-[#F59E0B] mt-0.5"></i>
                        <span class="line-clamp-1">{{ $item->lokasi }}</span>
                    </div>

                    <p class="text-gray-500 text-sm line-clamp-3 mb-6">
                        {{ $item->deskripsi }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ route('agenda.show', $item->id) }}" class="block text-center py-2.5 bg-gray-50 text-[#007F5F] font-bold text-sm rounded-xl border border-gray-100 hover:bg-[#007F5F] hover:text-white transition-all">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                <p class="text-gray-400 font-medium">Belum ada data agenda.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12 flex justify-center">
            {{ $agenda->links() }}
        </div>

    </div>
</div>
@endsection