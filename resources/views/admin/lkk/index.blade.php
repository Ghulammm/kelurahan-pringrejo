@extends('layouts.admin')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Manajemen LKK</h1>
            <p class="text-gray-500 text-sm">Kelola profil, foto, dan informasi lembaga kemasyarakatan.</p>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700">
        <p class="font-bold">Berhasil!</p>
        <p class="text-sm">{{ session('success') }}</p>
    </div>
    @endif

    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Lembaga</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Ringkasan</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status Foto</th>
                    <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($lkks as $lkk)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-8 py-6">
                        <span class="block font-black text-gray-800 uppercase tracking-tight">{{ $lkk->nama_lembaga }}</span>
                        <span class="text-[10px] text-[#007F5F] font-bold uppercase tracking-widest">{{ $lkk->kategori }}</span>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-sm text-gray-500 line-clamp-1 max-w-xs">{{ $lkk->deskripsi }}</p>
                    </td>
                    <td class="px-8 py-6">
                        @if($lkk->foto)
                            <span class="px-3 py-1 bg-green-50 text-green-600 text-[10px] font-bold rounded-full border border-green-100 uppercase">Tersedia</span>
                        @else
                            <span class="px-3 py-1 bg-red-50 text-red-600 text-[10px] font-bold rounded-full border border-red-100 uppercase">Kosong</span>
                        @endif
                    </td>
                    <td class="px-8 py-6 text-center">
                        <a href="{{ route('admin.lkk.edit', $lkk->id) }}" 
                           class="inline-flex items-center gap-2 px-6 py-2 bg-[#007F5F] text-white text-xs font-black uppercase tracking-widest rounded-xl hover:bg-[#00664d] shadow-lg shadow-[#007F5F]/20 transition-all">
                            <i class="fa fa-edit"></i> Edit Konten
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection