@extends('layouts.app')

@section('content')
<div class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-[1550px] mx-auto px-10 py-4 text-sm flex items-center gap-2 text-[#007F5F]">
        <a href="/" class="hover:underline font-medium opacity-70">Beranda</a>
        <span class="text-gray-300">/</span>
        <span class="opacity-70">Profil</span>
        <span class="text-gray-300">/</span>
        <span class="font-bold uppercase tracking-widest text-[10px]">Visi, Misi, & Motto</span>
    </div>
</div>

<div class="bg-[#F2FCF7] min-h-screen py-16 font-sans">
    <div class="max-w-[1400px] mx-auto px-6 lg:px-10 flex flex-col lg:flex-row gap-10">
        
        <div class="lg:w-[70%] bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 md:p-12">
            
            <h2 class="text-3xl md:text-4xl font-black text-gray-800 tracking-tight uppercase mb-6">
                VISI, MISI, MOTTO PELAYANAN
            </h2>
            
            <div class="flex items-center gap-4 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100 pb-6 mb-8">
                <button class="hover:text-[#007F5F] transition-colors"><i class="fa fa-print mr-1"></i> Print</button>
                <button class="hover:text-red-500 transition-colors"><i class="fa fa-file-pdf mr-1"></i> Download PDF</button>
            </div>

            <div class="text-gray-700 leading-relaxed text-[15px] md:text-[17px] space-y-8 text-justify">
                <p>
                    Visi, Misi, dan Motto Pelayanan Kelurahan Pringrejo, Kecamatan Pekalongan Barat, Kota Pekalongan:
                </p>

                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Visi:</h3>
                    <p>"Terwujudnya Kota Pekalongan yang lebih sejahtera, mandiri, dan berbudaya berlandaskan nilai-nilai Religius"</p>
                </div>

                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Misi:</h3>
                    <ol class="list-decimal pl-5 space-y-2 marker:text-[#007F5F] marker:font-bold">
                        <li>Meningkatkan akses dan mutu pendidikan masyarakat Kota Pekalongan.</li>
                        <li>Meningkatkan kualitas pelayanan publik untuk sebesar-besarnya bagi kesejahteraan masyarakat.</li>
                        <li>Memberdayakan ekonomi rakyat berbasis potensi lokal berdasarkan prinsip pembangunan yang berkelanjutan.</li>
                        <li>Meningkatkan kualitas dan kuantitas sarana dan prasarana perkotaan yang ramah lingkungan.</li>
                        <li>Mengembangkan IT (Informasi Teknologi) berbasis komunitas.</li>
                        <li>Melestarikan budaya dan kearifan lokal serta mengembangkan tata kehidupan bermasyarakat yang berakhlaqul karimah.</li>
                    </ol>
                </div>

                <div>
                    <h3 class="font-bold text-xl text-gray-900 mb-2">Motto Pelayanan:</h3>
                    <p class="font-bold italic text-[#007F5F]">Sukur, Akur, Makmur</p>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mt-16 pt-8 border-t border-gray-100">
                <a href="#" class="px-5 py-2.5 bg-[#1877F2] text-white rounded text-xs font-bold flex items-center gap-2 hover:bg-[#0d65d9] transition-colors"><i class="fab fa-facebook-f"></i> Share</a>
                <a href="#" class="px-5 py-2.5 bg-black text-white rounded text-xs font-bold flex items-center gap-2 hover:bg-gray-800 transition-colors"><i class="fab fa-twitter"></i> Post</a>
                <a href="#" class="px-5 py-2.5 bg-[#BD081C] text-white rounded text-xs font-bold flex items-center gap-2 hover:bg-[#a00617] transition-colors"><i class="fab fa-pinterest"></i> Pin</a>
                <a href="#" class="px-5 py-2.5 bg-[#0A66C2] text-white rounded text-xs font-bold flex items-center gap-2 hover:bg-[#0855a3] transition-colors"><i class="fab fa-linkedin-in"></i> Share</a>
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