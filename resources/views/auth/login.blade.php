<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kelurahan Pringrejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center px-6">

    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border-t-8 border-[#007F5F] transform transition-all">
        <div class="text-center mb-10">
            <img src="{{ asset('img/logopringrejo.png') }}" alt="Logo" class="h-20 mx-auto mb-4">
            <h1 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Admin Portal</h1>
            <p class="text-gray-400 text-sm font-medium mt-1 uppercase tracking-widest">Kelurahan Pringrejo</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-xl text-[11px] mb-6 font-bold border border-red-100 text-center uppercase tracking-wide">
                <i class="fa fa-exclamation-triangle mr-2"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Email Admin</label>
                <div class="relative group">
                    <i class="fa fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#007F5F] transition-colors"></i>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#007F5F] focus:bg-white transition-all text-sm font-medium" 
                        placeholder="admin@pringrejo.go.id">
                </div>
            </div>

            <div>
                <label class="block text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Password</label>
                <div class="relative group">
                    <i class="fa fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#007F5F] transition-colors"></i>
                    <input type="password" name="password" required 
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#007F5F] focus:bg-white transition-all text-sm font-medium" 
                        placeholder="••••••••">
                </div>
            </div>

            @php
                $useRealTurnstile = !empty(config('services.turnstile.site_key'));
            @endphp

            @if($useRealTurnstile)
                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                <div class="pt-2 flex justify-center">
                    <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                </div>
                @error('cf-turnstile-response')
                    <p class="text-red-500 text-[10px] mt-1 font-bold uppercase tracking-wider text-center">{{ $message }}</p>
                @enderror
                
                <button type="submit" class="w-full bg-[#007F5F] text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-[#007F5F]/30 hover:bg-[#00664B] transition-all transform hover:-translate-y-1 mt-5">
                    Masuk ke Dashboard
                </button>

            @else
                <div class="pt-2">
                    <div id="dummy-captcha" class="bg-gray-50 border border-gray-200 rounded-2xl p-4 flex items-center justify-between transition-all duration-500">
                        <div class="flex items-center gap-3">
                            <div id="captcha-loader" class="w-5 h-5 border-2 border-[#007F5F] border-t-transparent rounded-full animate-spin"></div>
                            <i id="captcha-success" class="fa fa-check-circle text-[#007F5F] text-xl hidden"></i>
                            <span id="captcha-text" class="text-[11px] font-bold text-gray-500 uppercase tracking-tight">Memverifikasi Keamanan...</span>
                        </div>
                        <div class="flex flex-col items-end opacity-40">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4b/Cloudflare_Logo.svg" class="h-3 mb-0.5" alt="Cloudflare">
                            <span class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">Turnstile (Dummy Mode)</span>
                        </div>
                    </div>
                    <input type="hidden" name="dummy_captcha" id="dummy-captcha-input" value="0">
                </div>

                <button type="submit" id="btn-login" disabled
                    class="w-full mt-5 bg-gray-300 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg transition-all transform cursor-not-allowed">
                    Masuk ke Dashboard
                </button>

                <script>
                    window.addEventListener('load', function() {
                        const btn = document.getElementById('btn-login');
                        const captchaBox = document.getElementById('dummy-captcha');
                        const loader = document.getElementById('captcha-loader');
                        const successIcon = document.getElementById('captcha-success');
                        const text = document.getElementById('captcha-text');
                        const input = document.getElementById('dummy-captcha-input');

                        setTimeout(() => {
                            loader.classList.add('hidden');
                            successIcon.classList.remove('hidden');
                            text.innerText = 'Verifikasi Berhasil';
                            text.classList.replace('text-gray-500', 'text-[#007F5F]');
                            captchaBox.classList.replace('bg-gray-50', 'bg-emerald-50');
                            captchaBox.classList.replace('border-gray-200', 'border-[#007F5F]');
                            
                            input.value = "1";
                            btn.disabled = false;
                            btn.classList.replace('bg-gray-300', 'bg-[#007F5F]');
                            btn.classList.replace('cursor-not-allowed', 'hover:bg-[#00664B]');
                            btn.classList.add('shadow-[#007F5F]/30', 'hover:-translate-y-1');
                        }, 1500); 
                    });
                </script>
            @endif
        </form>

        <div class="mt-10 text-center">
            <a href="/" class="text-xs font-bold text-gray-400 hover:text-[#007F5F] transition-colors uppercase tracking-widest flex items-center justify-center gap-2">
                <i class="fa fa-arrow-left"></i> Kembali ke Website
            </a>
        </div>
    </div>

    <script>
        // Simulasi Logika Turnstile
        window.addEventListener('load', function() {
            const btn = document.getElementById('btn-login');
            const captchaBox = document.getElementById('dummy-captcha');
            const loader = document.getElementById('captcha-loader');
            const successIcon = document.getElementById('captcha-success');
            const text = document.getElementById('captcha-text');
            const input = document.getElementById('dummy-captcha-input');

            setTimeout(() => {
                // Sembunyikan loader, tampilkan ceklis
                loader.classList.add('hidden');
                successIcon.classList.remove('hidden');
                
                // Update text & style
                text.innerText = 'Verifikasi Berhasil';
                text.classList.replace('text-gray-500', 'text-[#007F5F]');
                captchaBox.classList.replace('bg-gray-50', 'bg-emerald-50');
                captchaBox.classList.replace('border-gray-200', 'border-[#007F5F]');
                
                // Aktifkan Input & Tombol
                input.value = "1";
                btn.disabled = false;
                btn.classList.replace('bg-gray-300', 'bg-[#007F5F]');
                btn.classList.replace('cursor-not-allowed', 'hover:bg-[#00664B]');
                btn.classList.add('shadow-[#007F5F]/30', 'hover:-translate-y-1');
            }, 2000); // Simulasi 2 detik
        });
    </script>

</body>
</html>