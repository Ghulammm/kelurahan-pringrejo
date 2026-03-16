<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // Wajib ditambahkan untuk memanggil API Cloudflare

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Login
    public function showLogin() {
        // Jika sudah login, langsung lempar ke dashboard
        if (Auth::check()) {
            return redirect()->intended('/admin/dashboard');
        }
        return view('auth.login');
    }

    // 2. Memproses Login (Hybrid System)
    public function login(Request $request) {
        // Cek apakah Secret Key Turnstile sudah diisi di .env
        $useRealTurnstile = !empty(config('services.turnstile.secret_key'));

        // Aturan validasi dasar (Email & Password)
        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];
        
        $messages = [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ];

        // LOGIKA HYBRID: Cek Mode Captcha (Asli vs Dummy)
        if ($useRealTurnstile) {
            // MODE ASLI: Validasi ke server Cloudflare
            $rules['cf-turnstile-response'] = ['required', function ($attribute, $value, $fail) {
                $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret'   => config('services.turnstile.secret_key'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

                if (!$response->json('success')) {
                    $fail('Verifikasi keamanan Cloudflare gagal. Silakan coba lagi.');
                }
            }];
            $messages['cf-turnstile-response.required'] = 'Harap selesaikan verifikasi keamanan asli.';
        } else {
            // MODE DUMMY: Validasi input hidden dari JavaScript
            $rules['dummy_captcha'] = 'required|in:1';
            $messages['dummy_captcha.required'] = 'Verifikasi keamanan diperlukan.';
            $messages['dummy_captcha.in']       = 'Harap tunggu hingga verifikasi keamanan selesai.';
        }

        // Lakukan Validasi
        $request->validate($rules, $messages);

        // Ambil HANYA email dan password untuk proses pencocokan ke database
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/admin/dashboard')
                             ->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

    // 3. Memproses Logout (Versi Aman)
    public function logout(Request $request) {
        Auth::logout();

        // Menghancurkan session agar tidak bisa diakses kembali
        $request->session()->invalidate();

        // Membuat ulang token CSRF agar tidak bisa dipakai oleh orang lain
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}