<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\PengaduanController;

// MODEL UNTUK HALAMAN STATIS (Welcome Page)
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Statistik;

/*
|--------------------------------------------------------------------------
| RUTE PUBLIK (Akses Warga)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $berita_terbaru = Berita::latest()->take(3)->get();
    $galeri_terbaru = Galeri::latest()->take(3)->get();
    return view('welcome', compact('berita_terbaru', 'galeri_terbaru'));
});

// Pindahkan SKM dan LKK ke root
Route::get('/skm', function () { return view('skm.index'); })->name('skm.index');
Route::get('/lkk', function () { return view('lkk.index'); })->name('lkk.index');

// Pengaduan Sisi Warga
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::post('/pengaduan/kirim', [PengaduanController::class, 'store'])->name('pengaduan.store');

// --- PROFIL KELURAHAN ---
Route::prefix('profil')->group(function () {
    Route::get('/peta-kelurahan', function () {
        return view('profil.peta', ['berita_terbaru' => Berita::latest()->take(4)->get()]);
    })->name('profil.peta');

    Route::get('/visi-misi', function () {
        return view('profil.visimisi', ['berita_terbaru' => Berita::latest()->take(4)->get()]);
    })->name('profil.visimisi');

    Route::get('/demografi', function () {
        return view('profil.demografi', [
            'berita_terbaru' => Berita::latest()->take(4)->get(),
            'statistik' => Statistik::first()
        ]);
    })->name('profil.demografi');

    Route::get('/{slug}', [ProfilController::class, 'show'])->name('profil.show');
});

// --- BERITA, GALERI, AGENDA (Publik) ---
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/agenda/semua', [AgendaController::class, 'semua'])->name('agenda.semua');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

/*
|--------------------------------------------------------------------------
| RUTE AUTENTIKASI
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| RUTE ADMIN (Middleware Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // 1. Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // 2. Manajemen Berita
    Route::controller(BeritaController::class)->group(function () {
        Route::get('/berita', 'indexAdmin')->name('admin.berita.index');
        Route::get('/berita/tambah', 'create')->name('berita.create');
        Route::post('/berita/simpan', 'store')->name('berita.store');
        Route::get('/berita/edit/{id}', 'edit')->name('berita.edit');
        Route::put('/berita/update/{id}', 'update')->name('berita.update');
        Route::delete('/berita/hapus/{id}', 'destroy')->name('berita.destroy');
    });

    // 3. Manajemen Galeri
    Route::controller(GaleriController::class)->group(function () {
        Route::get('/galeri', 'indexAdmin')->name('admin.galeri.index');
        Route::get('/galeri/tambah', 'create')->name('galeri.create');
        Route::post('/galeri/simpan', 'store')->name('galeri.store');
        Route::delete('/galeri/hapus/{id}', 'destroy')->name('galeri.destroy');
    });

    // 4. Manajemen Agenda
    Route::controller(AgendaController::class)->group(function () {
        Route::get('/agenda', 'indexAdmin')->name('admin.agenda.index');
        Route::get('/agenda/tambah', 'create')->name('agenda.create');
        Route::post('/agenda/simpan', 'store')->name('agenda.store');
        Route::get('/agenda/edit/{id}', 'edit')->name('agenda.edit');
        Route::put('/agenda/update/{id}', 'update')->name('agenda.update');
        Route::delete('/agenda/hapus/{id}', 'destroy')->name('agenda.destroy');
    });

    // 5. Manajemen Profil
    Route::controller(ProfilController::class)->group(function () {
        Route::get('/profil', 'indexAdmin')->name('admin.profil.index');
        Route::get('/profil/tambah', 'create')->name('profil.create');
        Route::post('/profil/simpan', 'store')->name('profil.store');
        Route::get('/profil/edit/{id}', 'edit')->name('profil.edit');
        Route::put('/profil/update/{id}', 'update')->name('profil.update');
        Route::delete('/profil/hapus/{id}', 'destroy')->name('profil.destroy');
    });

    // 6. Manajemen Statistik (PERBAIKAN: Menggunakan PUT)
    Route::controller(StatistikController::class)->group(function () {
        Route::get('/statistik', 'index')->name('admin.statistik.index');
        Route::put('/statistik/update', 'update')->name('admin.statistik.update');
    });
// Sisi Warga (Hanya menampilkan halaman banner)
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');

});
use App\Http\Controllers\LkkController;

// RUTE PUBLIK
Route::get('/lkk', [LkkController::class, 'index'])->name('lkk.index');
Route::get('/lkk/{kategori}', [LkkController::class, 'show'])->name('lkk.show');

// RUTE ADMIN (Masukkan ke dalam group middleware auth)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::controller(LkkController::class)->group(function () {
        Route::get('/lkk', 'indexAdmin')->name('admin.lkk.index');
        Route::get('/lkk/edit/{id}', 'edit')->name('admin.lkk.edit');
        Route::put('/lkk/update/{id}', 'update')->name('admin.lkk.update');
    });
});