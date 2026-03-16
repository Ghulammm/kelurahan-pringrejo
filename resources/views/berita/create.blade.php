@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Tambah Berita Baru</h2>
            <p class="text-gray-400 text-sm">Publikasikan informasi terbaru untuk warga Pringrejo.</p>
        </div>
        <a href="{{ route('admin.berita.index') }}" class="text-[#007F5F] font-bold text-sm hover:underline italic flex items-center gap-2">
            <i class="fa fa-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-2xl mb-8 shadow-sm">
        <div class="flex items-center mb-2">
            <i class="fa fa-exclamation-circle text-red-500 mr-2"></i>
            <h3 class="text-red-800 font-bold uppercase text-xs tracking-widest">Ada kesalahan input:</h3>
        </div>
        <ul class="list-disc list-inside text-sm text-red-600 font-medium">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 space-y-8">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="md:col-span-2">
                <label class="block text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Judul Berita</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required 
                    class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none transition-all font-medium" 
                    placeholder="Contoh: Kerja Bakti Massal RW 01">
            </div>

            <div>
                <label class="block text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Kategori</label>
                <div class="relative">
                    <select name="kategori" required class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none appearance-none font-medium cursor-pointer">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Pemerintahan" {{ old('kategori') == 'Pemerintahan' ? 'selected' : '' }}>Pemerintahan</option>
                    </select>
                    <i class="fa fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-xs"></i>
                </div>
            </div>

            <div>
                <label class="block text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Tanggal Publish</label>
                <input type="date" name="tanggal_publish" value="{{ old('tanggal_publish', date('Y-m-d')) }}" required 
                    class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none transition-all font-medium">
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Isi Berita</label>
                <textarea name="konten" rows="8" required 
                    class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-[#007F5F] focus:bg-white outline-none transition-all font-medium" 
                    placeholder="Tulis narasi lengkap berita di sini...">{{ old('konten') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-xs font-black text-gray-500 uppercase tracking-[0.2em] mb-3">Foto Utama Berita</label>
                
                <div class="relative group">
                    <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" onchange="previewImage(this)">
                    <label for="gambar" class="cursor-pointer">
                        <div id="dropzone" class="p-8 border-2 border-dashed border-gray-100 rounded-3xl bg-gray-50 hover:bg-emerald-50/30 hover:border-emerald-200 transition-all text-center">
                            <div id="preview-container" class="hidden mb-4">
                                <img id="img-preview" class="mx-auto max-h-64 rounded-xl shadow-md border-4 border-white">
                                <p class="text-[#007F5F] text-xs font-bold mt-2 uppercase tracking-widest">Klik untuk ganti foto</p>
                            </div>
                            
                            <div id="placeholder-content">
                                <i class="fa fa-cloud-arrow-up text-4xl text-gray-300 group-hover:text-[#007F5F] mb-3 transition-colors"></i>
                                <p class="text-sm font-bold text-gray-500 group-hover:text-[#007F5F]">Klik untuk unggah foto berita</p>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-widest font-bold">Maksimal 2MB (JPG, PNG, JPEG)</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-[#007F5F] text-white py-5 rounded-2xl font-black text-sm uppercase tracking-[0.2em] shadow-xl shadow-[#007F5F]/20 hover:bg-[#00664B] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                Terbitkan Berita <i class="fa fa-paper-plane"></i>
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('img-preview');
        const container = document.getElementById('preview-container');
        const placeholder = document.getElementById('placeholder-content');
        const dropzone = document.getElementById('dropzone');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.classList.remove('hidden');
                placeholder.classList.add('hidden');
                dropzone.classList.remove('p-8');
                dropzone.classList.add('p-4');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection