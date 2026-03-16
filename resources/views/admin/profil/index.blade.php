@extends('layouts.admin') 

@section('content')
<div class="p-6 md:p-10 font-sans">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h2 class="text-[28px] font-black text-[#1F2937] uppercase tracking-tight">MANAJEMEN PROFIL</h2>
            <p class="text-gray-500 text-sm mt-1">Kelola halaman dropdown profil kelurahan (Sejarah, Visi Misi, dll).</p>
        </div>
        <a href="{{ route('profil.create') }}" class="bg-[#007F5F] hover:bg-[#00664B] text-white px-5 py-2.5 rounded-lg font-bold text-sm transition-all shadow-sm flex items-center gap-2">
            <i class="fa fa-plus"></i> TAMBAH PROFIL
        </a>
    </div>

    @if(session('success'))
    <div class="bg-[#E6F4F1] border border-[#007F5F]/20 text-[#007F5F] px-6 py-4 rounded-xl mb-6 font-medium flex items-center gap-3">
        <i class="fa fa-check-circle text-lg"></i> {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-[1.5rem] shadow-[0_5px_30px_-15px_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto p-4 md:p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 text-gray-400 text-[11px] font-bold uppercase tracking-[0.15em]">
                        <th class="pb-4 px-4 w-16 text-center">NO</th>
                        <th class="pb-4 px-4">JUDUL MENU / HALAMAN</th>
                        <th class="pb-4 px-4">LINK (SLUG)</th>
                        <th class="pb-4 px-4 text-center w-32">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($profils as $index => $item)
                    <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors group last:border-0">
                        <td class="py-5 px-4 text-center text-gray-400 font-semibold">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-5 px-4 font-bold text-gray-700">{{ $item->judul }}</td>
                        <td class="py-5 px-4 text-gray-400 font-mono text-xs">{{ $item->slug }}</td>
                        <td class="py-5 px-4 flex justify-center gap-2">
                            <a href="{{ route('profil.edit', $item->id) }}" class="bg-amber-50 text-amber-500 hover:bg-amber-500 hover:text-white w-8 h-8 rounded-lg flex items-center justify-center transition-colors">
                                <i class="fa fa-edit text-xs"></i>
                            </a>
                            <form action="{{ route('profil.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus halaman {{ $item->judul }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-50 text-red-500 hover:bg-red-500 hover:text-white w-8 h-8 rounded-lg flex items-center justify-center transition-colors">
                                    <i class="fa fa-trash text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-12 text-center text-gray-400">
                            <i class="fa fa-folder-open text-3xl mb-3 block opacity-40"></i>
                            Belum ada halaman profil yang dibuat.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection