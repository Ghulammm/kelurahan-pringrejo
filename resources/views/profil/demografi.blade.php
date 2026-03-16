@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="opacity-70">Profil</span>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Demografi & Wilayah</span>
    </div>
</div>

<div class="bg-[#F2FCF7] min-h-screen py-16 font-sans">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-10 flex flex-col lg:flex-row gap-10">
        
        <div class="lg:w-[70%] bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 md:p-12">
            
            <div class="mb-10 border-b border-gray-100 pb-8">
                <h2 class="text-3xl md:text-4xl font-black text-gray-800 tracking-tight uppercase mb-4">
                    Kondisi Demografi & Wilayah
                </h2>
                <p class="text-gray-500 text-[15px] md:text-[17px] leading-relaxed">
                    Gambaran umum kependudukan dan luas wilayah Kelurahan Pringrejo, Kecamatan Pekalongan Barat.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="rounded-2xl overflow-hidden h-64 shadow-sm border border-gray-100 group">
                    <img src="{{ ($statistik && $statistik->gambar_kantor) ? asset('storage/' . $statistik->gambar_kantor) : asset('img/kelurahan1.png') }}" 
                         alt="Kantor Kelurahan Pringrejo" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
                
                <div class="rounded-2xl overflow-hidden h-64 shadow-sm border border-gray-100 group">
                    <img src="{{ ($statistik && $statistik->gambar_wilayah) ? asset('storage/' . $statistik->gambar_wilayah) : asset('img/kelurahan2.png') }}" 
                         alt="Wilayah Kelurahan Pringrejo" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                </div>
            </div>

            <h3 class="font-bold text-xl text-gray-900 mb-6 uppercase tracking-wider">Statistik Kelurahan</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
    
                <div class="bg-[#E6F4F1] border border-[#007F5F]/10 rounded-2xl p-6 text-center hover:-translate-y-1 transition-transform duration-300">
                    <i class="fa fa-users text-3xl text-[#007F5F] mb-3"></i>
                    <h4 class="text-2xl font-black text-gray-800">{{ $statistik->jml_penduduk ?? '0' }}</h4>
                    <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest mt-1">Penduduk</p>
                </div>

                <div class="bg-[#E6F4F1] border border-[#007F5F]/10 rounded-2xl p-6 text-center hover:-translate-y-1 transition-transform duration-300">
                    <i class="fa fa-map text-3xl text-[#007F5F] mb-3"></i>
                    <h4 class="text-2xl font-black text-gray-800">{{ $statistik->luas_wilayah ?? '0' }}<span class="text-sm">Ha</span></h4>
                    <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest mt-1">Luas Wilayah</p>
                </div>

                <div class="bg-[#E6F4F1] border border-[#007F5F]/10 rounded-2xl p-6 text-center hover:-translate-y-1 transition-transform duration-300">
                    <i class="fa fa-home text-3xl text-[#007F5F] mb-3"></i>
                    <h4 class="text-2xl font-black text-gray-800">{{ $statistik->jml_rw ?? '0' }}</h4>
                    <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest mt-1">Jumlah RW</p>
                </div>

                <div class="bg-[#E6F4F1] border border-[#007F5F]/10 rounded-2xl p-6 text-center hover:-translate-y-1 transition-transform duration-300">
                    <i class="fa fa-home-user text-3xl text-[#007F5F] mb-3"></i>
                    <h4 class="text-2xl font-black text-gray-800">{{ $statistik->jml_rt ?? '0' }}</h4>
                    <p class="text-[11px] font-bold text-gray-500 uppercase tracking-widest mt-1">Jumlah RT</p>
                </div>
            </div>

            <div class="text-gray-700 leading-relaxed text-[15px] md:text-[17px] space-y-6 text-justify">
                <h3 class="font-bold text-xl text-gray-900 mb-2">Kondisi Demografis</h3>
                <p>
                    Kelurahan Pringrejo merupakan salah satu kelurahan yang terletak di Kecamatan Pekalongan Barat, Kota Pekalongan. Secara geografis, wilayah ini memiliki karakteristik dataran rendah yang padat penduduk dengan mayoritas lahan digunakan untuk permukiman warga dan fasilitas umum.
                </p>
                <p>
                    Berdasarkan data kependudukan terakhir, komposisi penduduk Kelurahan Pringrejo cukup berimbang antara laki-laki dan perempuan. Sebagian besar mata pencaharian penduduk berada di sektor perdagangan, jasa, buruh industri batik, dan sebagian lainnya adalah Pegawai Negeri Sipil (PNS) serta wirausaha mandiri (UMKM).
                </p>
                <p>
                    Tingkat pendidikan masyarakat terus mengalami peningkatan seiring dengan berbagai program pemberdayaan dari pemerintah kota. Fasilitas kesehatan seperti Posyandu dan Puskesmas Pembantu juga beroperasi aktif untuk memastikan kesejahteraan dan kesehatan warga dari balita hingga lansia.
                </p>
            </div>
        </div>

        <div class="lg:w-[30%]">
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 sticky top-32">
                <h3 class="font-black text-lg text-gray-800 tracking-wide uppercase border-b-2 border-[#007F5F] inline-block pb-2 mb-6">
                    BERITA TERBARU
                </h3>

                <div class="space-y-6">
                    @forelse($berita_terbaru as $berita)
                    <a href="{{ route('berita.show', $berita->slug) }}" class="flex items-center gap-4 group">
                        <div class="w-16 h-16 rounded-full overflow-hidden flex-none border border-gray-100">
                            <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <h4 class="font-bold text-[13px] text-gray-800 leading-tight group-hover:text-[#007F5F] transition-colors line-clamp-2 uppercase">
                                {{ $berita->judul }}
                            </h4>
                            <p class="text-[11px] text-gray-400 font-bold uppercase tracking-wider mt-1.5 flex items-center gap-1.5">
                                <i class="fa fa-clock text-[#007F5F]/70"></i> 
                                {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d M Y') }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <p class="text-sm text-gray-400 italic">Belum ada berita terbaru.</p>
                    @endforelse
                </div>

                <div class="mt-8 pt-6 border-t border-gray-50 text-center">
                    <a href="{{ route('berita.index') }}" class="text-[12px] font-bold text-[#007F5F] uppercase tracking-widest hover:underline">
                        Lihat Semua Berita <i class="fa fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection