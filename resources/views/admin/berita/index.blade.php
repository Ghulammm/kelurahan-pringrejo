@extends('layouts.admin')

@section('content')
<div class="max-w-[1550px] mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Manajemen Berita</h2>
            <p class="text-gray-500 font-medium mt-1">Lihat, edit, atau hapus berita yang telah diterbitkan.</p>
        </div>
        <a href="{{ route('berita.create') }}" class="flex items-center justify-center gap-2 bg-[#007F5F] text-white px-8 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-[#007F5F]/20 hover:bg-[#00664B] transition-all transform hover:-translate-y-1">
            <i class="fa fa-plus text-xs"></i> Tambah Berita Baru
        </a>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl mb-6 font-bold text-sm flex items-center gap-3">
        <i class="fa fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-[0.2em]">Thumbnail</th>
                        <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-[0.2em]">Informasi Berita</th>
                        <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-[0.2em] text-center">Kategori</th>
                        <th class="px-8 py-6 text-xs font-black text-gray-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($berita as $item)
                    <tr class="group hover:bg-gray-50/80 transition-all">
                        <td class="px-8 py-6">
                            <div class="w-24 h-16 rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <h4 class="font-bold text-gray-800 text-lg leading-tight group-hover:text-[#007F5F] transition-colors">
                                {{ Str::limit($item->judul, 70) }}
                            </h4>
                            <div class="flex items-center gap-4 mt-2 text-xs text-gray-400 font-bold uppercase tracking-widest">
                                <span><i class="fa fa-calendar-alt text-[#007F5F] mr-1"></i> {{ \Carbon\Carbon::parse($item->tanggal_publish)->translatedFormat('d M Y') }}</span>
                                <span><i class="fa fa-user text-[#007F5F] mr-1"></i> Admin</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-center">
                            <span class="inline-block px-4 py-1.5 rounded-full bg-emerald-50 text-[#007F5F] text-[10px] font-black uppercase tracking-widest border border-emerald-100">
                                {{ $item->kategori }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="#" class="w-11 h-11 flex items-center justify-center rounded-xl bg-amber-50 text-amber-500 hover:bg-amber-500 hover:text-white transition-all shadow-sm shadow-amber-200/20" title="Edit Berita">
                                    <i class="fa fa-edit text-sm"></i>
                                </a>
                                
                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-11 h-11 flex items-center justify-center rounded-xl bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm shadow-red-200/20" title="Hapus Berita">
                                        <i class="fa fa-trash-alt text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center">
                            <i class="fa fa-newspaper text-6xl text-gray-100 mb-4 block"></i>
                            <p class="text-gray-400 font-bold uppercase tracking-widest">Belum ada berita yang diterbitkan</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection