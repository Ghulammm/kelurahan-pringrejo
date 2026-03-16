@extends('layouts.admin')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
    <div>
        <h3 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Galeri Foto Kegiatan</h3>
        <p class="text-sm text-gray-500 mt-1 font-medium">Dokumentasi momen-momen penting di Kelurahan Pringrejo.</p>
    </div>
    <a href="{{ route('galeri.create') }}" class="inline-flex items-center gap-2 bg-[#007F5F] hover:bg-[#00664B] text-white px-6 py-3 rounded-xl font-bold text-sm transition-all shadow-lg shadow-[#007F5F]/20 active:scale-95">
        <i class="fa fa-camera text-xs"></i> UNGGAH FOTO BARU
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @forelse($galeri as $item)
    <div class="group bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
        <div class="relative h-48 overflow-hidden">
            <img src="{{ asset('uploads/galeri/' . $item->gambar) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-10 h-10 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors shadow-lg">
                        <i class="fa fa-trash text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="p-5 flex-1 flex flex-col justify-between">
            <h4 class="font-extrabold text-gray-800 text-sm line-clamp-2 leading-tight uppercase tracking-tight">
                {{ $item->judul }}
            </h4>
            <p class="text-[10px] text-gray-400 font-bold mt-3 uppercase tracking-widest italic">
                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
            </p>
        </div>
    </div>
    @empty
    <div class="col-span-full py-20 text-center bg-gray-50 rounded-[3rem] border-4 border-dashed border-gray-200">
        <i class="fa fa-images text-5xl text-gray-200 mb-4 block"></i>
        <h3 class="text-gray-400 font-black uppercase tracking-widest text-sm">Galeri Masih Kosong</h3>
    </div>
    @endforelse
</div>
@endsection