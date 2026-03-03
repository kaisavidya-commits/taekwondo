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

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/admin', [AdminController::class, 'index']);
Route::get('/admin/murid', [MuridController::class, 'index']);
Route::get('/admin/pembina', [PembinaController::class, 'index']);
Route::get('/admin/pendaftar', [PendaftarController::class, 'index']);
Route::get('/admin/event', [EventController::class, 'index']);
Route::get('/admin/iuran', [IuranController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('guru', GuruController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';