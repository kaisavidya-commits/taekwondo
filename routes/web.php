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
use App\Http\Controllers\SignupController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');

//Route::get('/pendaftaran', [PendaftarController::class, 'form'])->name('pendaftar.form');
Route::post('/pendaftaran', [PendaftarController::class, 'store'])->name('pendaftar.store');

Route::get('/cek-status', [PendaftarController::class, 'cekStatus'])->name('cek.status');
Route::post('/cek-status', [PendaftarController::class, 'hasilStatus'])->name('cek.hasil');

Route::get('/signup-siswa', [SignupController::class, 'form']);
Route::post('/signup-siswa', [SignupController::class, 'store'])->name('signup.siswa');

/*
|--------------------------------------------------------------------------
| Auth Routes (profile)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Super Admin only: manajemen akun admin
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/admin',              [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/create',       [AdminController::class, 'create'])->name('admin.create');
        Route::post('/admin',             [AdminController::class, 'store'])->name('admin.store');
        Route::delete('/admin/{admin}',   [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    // Super Admin + Admin + Pembina
    Route::middleware('role:super_admin,admin,pembina')->group(function () {
        Route::resource('murid', MuridController::class);
        Route::resource('events', EventController::class);
    });

    // Super Admin + Admin only
    Route::middleware('role:super_admin,admin')->name('admin.')->group(function () {
        Route::resource('pendaftar', PendaftarController::class)->except(['create', 'store']);
        Route::post('/pendaftar/{id}/tolak', [PendaftarController::class, 'tolak'])->name('pendaftar.tolak');

        Route::resource('pembina', PembinaController::class);

        Route::get('/iuran',                  [IuranController::class, 'index'])->name('iuran.index');
        Route::get('/iuran/create',           [IuranController::class, 'create'])->name('iuran.create');
        Route::post('/iuran/store',           [IuranController::class, 'store'])->name('iuran.store');
        Route::post('/iuran/confirm/{id}',    [IuranController::class, 'confirm'])->name('iuran.confirm');
    });

});

/*
|--------------------------------------------------------------------------
| Murid Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:murid'])->prefix('murid/iuran')->group(function () {
    Route::post('/bayar/{id}', [IuranController::class, 'bayar'])->name('murid.iuran.bayar');
});

/*
|--------------------------------------------------------------------------
| Super Admin tambahan
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/lele', function () { return view('lele'); })->name('lele');
});

require __DIR__.'/auth.php';