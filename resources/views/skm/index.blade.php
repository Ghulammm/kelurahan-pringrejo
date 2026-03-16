@extends('layouts.app')

@section('content')
    <div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Skm</span>
    </div>
</div>
<div class="bg-[#F2FCF7] min-h-screen py-16 lg:py-24 font-sans">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center">
        
        <div class="text-center mb-12">
    <h2 class="text-[32px] font-bold border-b-4 border-[#007F5F] inline-block pb-3.5 leading-tight tracking-tight">
        Survei Kepuasan Masyarakat
    </h2>
    <p class="text-gray-700 text-[17px] mt-6 leading-relaxed max-w-2xl mx-auto">
        Suara Anda sangat berarti bagi kami. Bantu kami mengevaluasi dan meningkatkan kualitas pelayanan publik di Kelurahan Pringrejo melalui survei ini.
    </p>
</div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 max-w-5xl mx-auto">
            
            <div class="bg-white rounded-[2.5rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.1)] p-10 lg:p-14 border border-gray-100 flex flex-col items-center transition-transform hover:-translate-y-2 duration-300">
                <div class="w-24 h-24 bg-[#E6F4F1] rounded-full flex items-center justify-center mb-8">
                    <i class="fa fa-list-check text-4xl text-[#007F5F]"></i>
                </div>
                
                <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-4">
                    Formulir Survei Masyarakat
                </h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-10">
                    Berikan penilaian dan masukan Anda terkait pelayanan administrasi yang baru saja Anda terima di kantor Kelurahan Pringrejo.
                </p>

                <a href="https://skm.pekalongankota.go.id/" target="_blank" class="w-full py-4 bg-[#007F5F] hover:bg-[#00664B] text-white rounded-full font-bold text-sm flex items-center justify-center gap-3 transition-all shadow-lg shadow-[#007F5F]/20">
                    Isi Survei Sekarang <i class="fa fa-external-link-alt text-xs"></i>
                </a>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-[0_15px_40px_-15px_rgba(0,0,0,0.1)] p-10 lg:p-14 border border-gray-100 flex flex-col items-center transition-transform hover:-translate-y-2 duration-300">
                <div class="w-24 h-24 bg-[#FFF4E1] rounded-full flex items-center justify-center mb-8">
                    <i class="fa fa-chart-pie text-4xl text-[#D97706]"></i>
                </div>
                
                <h3 class="text-xl lg:text-2xl font-black text-gray-800 mb-4">
                    Data Hasil Survei (SKM)
                </h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-10">
                    Akses transparansi data rekapitulasi penilaian dan Indeks Kepuasan Masyarakat (IKM) Kelurahan Pringrejo secara berkala.
                </p>

                <a href="https://skm.pekalongankota.go.id/datainstansi/" target="_blank" class="w-full py-4 bg-[#007F5F] hover:bg-[#00664B] text-white rounded-full font-bold text-sm flex items-center justify-center gap-3 transition-all shadow-lg shadow-[#007F5F]/20">
                    Lihat Data Hasil <i class="fa fa-external-link-alt text-xs"></i>
                </a>
            </div>

        </div>

    </div>
</div>
@endsection