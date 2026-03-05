<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IuranController;

/*
|--------------------------------------------------------------------------
| Routes untuk Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard untuk semua role login
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Iuran: semua user login bisa lihat
    Route::get('/iuran', [IuranController::class, 'index'])->name('admin.iuran.index');

    // Admin & Super Admin: tambah & konfirmasi iuran
    Route::middleware('role:super_admin,admin')->group(function () {
        Route::post('/iuran/store', [IuranController::class, 'store'])->name('admin.iuran.store');
        Route::post('/iuran/confirm/{id}', [IuranController::class, 'confirm'])->name('admin.iuran.confirm');
    });

    // Super Admin: manajemen admin
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/', [AdminController::class, 'store'])->name('admin.store');
        Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    // Super Admin, Admin, Pembina: manajemen murid & event
    Route::middleware('role:super_admin,admin,pembina')->group(function () {
        Route::get('/murid', [MuridController::class, 'index']);
        Route::get('/event', [EventController::class, 'index']);
    });

    // Super Admin & Admin: manajemen pendaftar, pembina
    Route::middleware('role:super_admin,admin')->group(function () {
        Route::get('/pendaftar', [PendaftarController::class, 'index']);
        Route::get('/pembina', [PembinaController::class, 'index']);
        // INDEX: semua role login bisa lihat iuran
        Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/iuran', [IuranController::class, 'index'])
        ->name('admin.iuran.index');
        });

        // CREATE & STORE: hanya super_admin & admin
        Route::middleware(['auth','role:super_admin,admin'])->prefix('admin/iuran')->group(function () {
    Route::get('/create', [IuranController::class, 'create'])->name('admin.iuran.create');
    Route::post('/store', [IuranController::class, 'store'])->name('admin.iuran.store');
    Route::post('/confirm/{id}', [IuranController::class, 'confirm'])->name('admin.iuran.confirm');
        });

    // BAYAR: hanya murid
    Route::middleware(['auth','role:murid'])->prefix('murid/iuran')->group(function () {
    Route::post('/bayar/{id}', [IuranController::class, 'bayar'])->name('murid.iuran.bayar');
    });

    // Pembina: akses khusus
    Route::middleware('role:pembina')->get('/pembina', function () {
        return view('pembina.index');
    });

    // Murid: akses murid tertentu
    Route::middleware('role:siswa')->get('/murid', function () {
        return view('murid.index');
    });

});});

/*
|--------------------------------------------------------------------------
| Routes publik / umum
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');

/*
|--------------------------------------------------------------------------
| Routes dashboard default & super_admin tambahan
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:super_admin')->get('/lele', function () {
        return view('lele');
    })->name('lele');

Route::resource('pembina', PembinaController::class);

});

/*
|--------------------------------------------------------------------------
| Routes profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';