@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12 font-sans">
    
    <div class="mb-8">
        <a href="{{ route('admin.profil.index') }}" class="text-[#007F5F] font-bold text-sm flex items-center gap-2 hover:underline mb-2">
            <i class="fa fa-arrow-left"></i> Kembali ke Data Profil
        </a>
        <h2 class="text-2xl font-black text-gray-800 tracking-tight">Edit Halaman Profil</h2>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10">
        <form action="{{ route('profil.update', $profil->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Judul Menu / Halaman <span class="text-red-500">*</span>
                </label>
                <input type="text" name="judul" value="{{ $profil->judul }}" required 
                       class="w-full px-5 py-3.5 rounded-xl border border-gray-200 focus:border-[#007F5F] focus:ring-4 focus:ring-[#007F5F]/10 outline-none transition-all text-sm font-medium text-gray-800">
            </div>

            <div class="mb-10">
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Konten Halaman <span class="text-red-500">*</span>
                </label>
                <textarea id="konten" name="konten">{{ $profil->konten }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.profil.index') }}" class="px-6 py-3 border border-gray-200 text-gray-600 font-bold text-sm rounded-xl hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3 bg-amber-500 hover:bg-amber-600 text-white font-bold text-sm rounded-xl transition-all shadow-lg shadow-amber-500/20 flex items-center gap-2">
                    <i class="fa fa-save"></i> Update Halaman
                </button>
            </div>
        </form>
    </div>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#konten' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@endsection