<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratDinasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratTugasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/surat-tugas/create', function () {
        return view('surat-tugas.create');
    })->name('surat-tugas.create');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/spd/create', function () {
        return view('spd.create');
    })->name('spd.create');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/surat-tugas/preview', function (\Illuminate\Http\Request $request) {
        return view('surat-tugas.preview', [
            'data' => $request->all()
        ]);
    })->name('surat-tugas.preview');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/spd/preview', function (\Illuminate\Http\Request $request) {
        return view('spd.preview', [
            'data' => $request->all()
        ]);
    })->name('spd.preview');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/surat-tugas/preview', [SuratTugasController::class, 'preview'])
        ->name('surat-tugas.preview');

    Route::post('/surat-tugas/pdf', [SuratTugasController::class, 'pdf'])
        ->name('surat-tugas.pdf');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/spd/preview', [SuratDinasController::class, 'preview'])
        ->name('spd.preview');

    Route::post('/spd/pdf', [SuratDinasController::class, 'pdf'])
        ->name('spd.spd-pdf');
});


require __DIR__.'/auth.php';
