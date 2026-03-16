@extends('layouts.admin')

@section('content')
<div class="mb-10 flex items-center gap-4">
    <a href="{{ route('admin.galeri.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-white border border-gray-200 text-gray-400 hover:text-[#007F5F] hover:border-[#007F5F] transition-all">
        <i class="fa fa-arrow-left"></i>
    </a>
    <div>
        <h3 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Unggah Dokumentasi</h3>
        <p class="text-xs text-gray-500 font-medium">Tambahkan foto kegiatan baru ke galeri Pringrejo.</p>
    </div>
</div>

<div class="max-w-2xl mx-auto">
    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100">
        @csrf
        <div class="space-y-8">
            
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Keterangan / Judul Foto</label>
                <input type="text" name="judul_foto" required placeholder="Contoh: Penyaluran Bansos Tahap I" 
                       value="{{ old('judul_foto') }}"
                       class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-[#007F5F]/10 focus:border-[#007F5F] outline-none transition-all font-bold text-gray-700">
                @error('judul_foto') <p class="text-red-500 text-[10px] mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Kategori</label>
                <div class="relative">
                    <select name="kategori" required class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-[#007F5F]/10 focus:border-[#007F5F] outline-none appearance-none font-bold text-gray-700 cursor-pointer">
                        <option value="" disabled selected>Pilih Kategori Kegiatan</option>
                        <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                        <option value="Pemerintahan" {{ old('kategori') == 'Pemerintahan' ? 'selected' : '' }}>Pemerintahan</option>
                    </select>
                    <i class="fa fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-xs"></i>
                </div>
                @error('kategori') <p class="text-red-500 text-[10px] mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" rows="3" placeholder="Tambahkan detail singkat tentang momen ini..." 
                          class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-[#007F5F]/10 focus:border-[#007F5F] outline-none transition-all font-medium text-gray-700">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <p class="text-red-500 text-[10px] mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-3">Pilih File Gambar</label>
                <div class="relative group">
                    <input type="file" name="file_gambar" id="file_gambar" required accept="image/*" onchange="previewImage()"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div id="dropzone" class="p-10 border-4 border-dashed border-gray-100 rounded-[2rem] text-center group-hover:border-[#007F5F]/30 transition-all bg-gray-50/50">
                        <div id="preview-container" class="hidden mb-4">
                            <img id="image-preview" class="max-h-48 mx-auto rounded-xl shadow-md">
                            <p class="text-[#007F5F] text-[10px] font-bold mt-3 uppercase tracking-widest">Klik area ini untuk mengganti foto</p>
                        </div>
                        <div id="upload-placeholder">
                            <i class="fa fa-cloud-upload-alt text-4xl text-gray-200 group-hover:text-[#007F5F] transition-colors mb-4 block"></i>
                            <p class="text-sm font-bold text-gray-400 group-hover:text-gray-600 transition-colors">Klik atau pilih foto di sini</p>
                            <p class="text-[10px] text-gray-300 mt-2 uppercase tracking-widest font-black">Format: JPG, PNG (Maks. 2MB)</p>
                        </div>
                    </div>
                </div>
                @error('file_gambar') <p class="text-red-500 text-[10px] mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-[#007F5F] hover:bg-[#00664B] text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-[#007F5F]/20 transition-all active:scale-95">
                SIMPAN KE GALERI <i class="fa fa-check-circle ml-2 text-sm"></i>
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage() {
        // PERBAIKAN: Mengambil input berdasarkan id file_gambar
        const image = document.querySelector('#file_gambar');
        const imgPreview = document.querySelector('#image-preview');
        const previewContainer = document.querySelector('#preview-container');
        const placeholder = document.querySelector('#upload-placeholder');

        if (image.files && image.files[0]) {
            previewContainer.classList.remove('hidden');
            placeholder.classList.add('hidden');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    }
</script>
@endsection