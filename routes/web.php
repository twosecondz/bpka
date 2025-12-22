<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratDinasController;
use App\Http\Controllers\SuratTugasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Arahkan halaman utama langsung ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Dashboard (Hanya bisa diakses jika login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. GRUP ROUTE YANG BUTUH LOGIN (Middleware Auth digabung jadi satu)
Route::middleware(['auth'])->group(function () {

    // --- PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- SURAT TUGAS ---
    // Halaman Form Create
    Route::get('/surat-tugas/create', function () {
        return view('surat-tugas.create');
    })->name('surat-tugas.create');

    // Proses Preview & PDF (Pakai Controller)
    Route::post('/surat-tugas/preview', [SuratTugasController::class, 'preview'])->name('surat-tugas.preview');
    Route::post('/surat-tugas/pdf', [SuratTugasController::class, 'pdf'])->name('surat-tugas.pdf');

    // --- SURAT PERJALANAN DINAS (SPD) ---
    // Halaman Form Create
    Route::get('/spd/create', function () {
        return view('spd.create');
    })->name('spd.create');

    // Proses Preview & PDF (Pakai Controller)
    Route::post('/spd/preview', [SuratDinasController::class, 'preview'])->name('spd.preview');
    Route::post('/spd/pdf', [SuratDinasController::class, 'pdf'])->name('spd.spd-pdf');
});

require __DIR__.'/auth.php';
