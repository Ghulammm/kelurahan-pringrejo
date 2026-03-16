<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Kelurahan Pringrejo</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.2); }
    </style>
</head>
<body class="bg-gray-50 flex overflow-hidden h-screen">

    <aside class="w-72 bg-[#191F2F] text-white flex flex-col shadow-xl z-50">
        <div class="p-8 border-b border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg overflow-hidden border-2 border-[#007F5F]">
                    <img src="{{ asset('img/logopringrejo.png') }}" class="w-8 h-auto" onerror="this.src='https://ui-avatars.com/api/?name=P&background=007F5F&color=fff'">
                </div>
                <div>
                    <h1 class="font-bold text-sm tracking-tight leading-none uppercase">Admin Panel</h1>
                    <p class="text-[9px] text-emerald-400 font-bold uppercase tracking-[0.2em] mt-1">Pringrejo Hub</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-6 space-y-2 overflow-y-auto">
    <p class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] mb-4 ml-2 italic">Menu Utama</p>
    
    <a href="{{ route('admin.dashboard') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/dashboard') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-th-large w-5 text-center"></i> Dashboard
    </a>

    <a href="{{ route('admin.berita.index') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/berita*') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-newspaper w-5 text-center"></i> Kelola Berita
    </a>

    <a href="{{ route('admin.galeri.index') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/galeri*') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-images w-5 text-center"></i> Kelola Galeri
    </a>

    <a href="{{ route('admin.agenda.index') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/agenda*') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-calendar-alt w-5 text-center"></i> Kelola Agenda
    </a>
    
    <a href="{{ route('admin.profil.index') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/profil*') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-id-badge w-5 text-center"></i> Kelola Dropdown Profil
    </a>

    <a href="{{ route('admin.statistik.index') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/statistik*') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-chart-bar w-5 text-center"></i> Update Demografi
    </a>
    <a href="{{ route('admin.lkk.index') }}" 
       class="flex items-center gap-3 p-4 rounded-xl transition-all font-bold text-sm {{ request()->is('admin/lkk*') ? 'bg-[#007F5F] text-white shadow-lg shadow-[#007F5F]/20' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
        <i class="fa fa-sitemap w-5 text-center"></i> Kelola LKK
    </a>
    
    
</nav>

        <div class="p-6 border-t border-white/5 bg-[#141926]">
            <p class="text-[9px] text-gray-500 text-center uppercase tracking-widest font-bold">Pemerintah Desa Pringrejo</p>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        
        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-10 flex-none shadow-sm z-40">
            <div>
                <h2 class="font-bold text-gray-800 uppercase tracking-widest text-[10px] flex items-center gap-3">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    Sistem Konten Pringrejo
                </h2>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Hari Ini</p>
                    <p class="text-sm font-black text-gray-700 leading-none">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                </div>
                
                <div class="h-8 w-px bg-gray-100"></div>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.outside="open = false" class="flex items-center gap-3 focus:outline-none group">
                        <div class="text-right">
                            <p class="text-xs font-black text-gray-800 leading-none capitalize group-hover:text-[#007F5F] transition-colors">
                                {{ Auth::user()->name ?? 'Administrator' }}
                            </p>
                            <p class="text-[9px] font-bold text-emerald-600 uppercase mt-1 tracking-tighter flex items-center justify-end gap-1 font-black">
                                Online <i class="fa fa-circle text-[6px]"></i>
                            </p>
                        </div>
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#007F5F] to-emerald-400 shadow-lg shadow-[#007F5F]/20 flex items-center justify-center text-white font-black text-lg border-2 border-white transition-transform group-active:scale-90">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 mt-3 w-60 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-[60]">
                        
                        <div class="px-5 py-4 border-b border-gray-50 mb-2">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-1">Email Aktif</p>
                            <p class="text-xs font-bold text-gray-700 truncate">{{ Auth::user()->email ?? 'admin@pringrejo.desa.id' }}</p>
                        </div>

                        <div class="px-2 pb-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 transition-all font-bold text-sm">
                                    <i class="fa fa-sign-out-alt w-5 text-center"></i>
                                    Keluar Dari Panel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto bg-[#F8FAFC] p-8 md:p-12">
            
            @if(session('success'))
                <div class="mb-8 p-5 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 font-bold text-sm rounded-r-2xl shadow-sm flex items-center justify-between animate-fadeIn">
                    <div class="flex items-center">
                        <i class="fa fa-check-circle mr-3 text-lg"></i> {{ session('success') }}
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600"><i class="fa fa-times"></i></button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-5 bg-red-50 border-l-4 border-red-500 text-red-700 font-bold text-sm rounded-r-2xl shadow-sm flex items-center justify-between animate-fadeIn">
                    <div class="flex items-center">
                        <i class="fa fa-exclamation-triangle mr-3 text-lg"></i> {{ session('error') }}
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600"><i class="fa fa-times"></i></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script>
        // Auto-close alert after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.animate-fadeIn');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>