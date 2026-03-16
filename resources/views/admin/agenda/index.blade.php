@extends('layouts.admin')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
    <div>
        <h3 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Manajemen Agenda</h3>
        <p class="text-sm text-gray-500 mt-1 font-medium">Kelola jadwal kegiatan dan acara Kelurahan Pringrejo</p>
    </div>
    <a href="{{ route('agenda.create') }}" class="inline-flex items-center gap-2 bg-[#007F5F] hover:bg-[#00664B] text-white px-6 py-3 rounded-xl font-bold text-sm transition-all shadow-lg shadow-[#007F5F]/20 active:scale-95">
        <i class="fa fa-plus text-xs"></i> TAMBAH AGENDA
    </a>
</div>

<div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nama Kegiatan</th>
                    <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Tanggal Pelaksanaan</th>
                    <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Lokasi</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($agenda as $item)
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-8 py-6">
                        <p class="font-bold text-gray-800 group-hover:text-[#007F5F] transition-colors">{{ $item->judul }}</p>
                        <p class="text-[10px] text-gray-400 font-medium mt-1 line-clamp-1 max-w-xs">{{ $item->deskripsi }}</p>
                    </td>
                    <td class="px-6 py-6">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-[#007F5F] flex items-center justify-center font-black text-xs">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y') }}</p>
                                <p class="text-[9px] text-gray-400 uppercase font-bold tracking-widest">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l') }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-6">
                        <span class="flex items-center gap-2 text-xs font-bold text-gray-600">
                            <i class="fa fa-map-marker-alt text-red-400"></i> {{ $item->lokasi }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('agenda.edit', $item->id) }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white transition-all shadow-sm">
                                <i class="fa fa-edit text-sm"></i>
                            </a>
                            <form action="{{ route('agenda.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                                    <i class="fa fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-10 text-center">
                        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Belum ada agenda yang ditambahkan</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection