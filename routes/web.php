
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


// Semua role login bisa akses halaman iuran
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Halaman utama iuran
    Route::get('/iuran', [IuranController::class, 'index'])->name('admin.iuran');

    // Tambah iuran / simpan → bisa diakses oleh admin/super_admin
    Route::post('/iuran/store', [IuranController::class, 'store'])
        ->name('admin.iuran.store')
        ->middleware('role:super_admin,admin');

    // Konfirmasi pembayaran → Hanya super_admin & admin
    Route::post('/iuran/konfirmasi/{id}', [IuranController::class, 'confirm'])
        ->name('admin.iuran.confirm')
        ->middleware('role:super_admin,admin');

    // Murid bayar tagihan → hanya role murid
    Route::post('/iuran/bayar/{id}', [IuranController::class, 'bayar'])
        ->name('murid.iuran.bayar')
        ->middleware('role:murid');
});
Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

});

Route::middleware(['auth','role:super_admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/admin', [AdminController::class, 'index']);

});

Route::middleware(['auth','role:super_admin,admin,pembina'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/murid', [MuridController::class, 'index']);
        Route::get('/event', [EventController::class, 'index']);

});


Route::middleware(['auth','role:super_admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/', [AdminController::class, 'store'])->name('admin.store');
        Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

});


Route::middleware(['auth','role:pembina'])->get('/pembina', function () {
    return view('pembina.index');
});

Route::middleware(['auth','role:siswa'])->get('/murid', function () {
    return view('murid.index');
});

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

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['auth','role:super_admin'])->get('/lele', function () {
        return view('lele');
    })->name('lele');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';