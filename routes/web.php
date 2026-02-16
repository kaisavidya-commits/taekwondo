<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/murid', [\App\Http\Controllers\MuridController::class, 'edit'])->name('murid.edit');
    Route::patch('/murid', [\App\Http\Controllers\MuridController::class, 'update'])->name('murid.update');
    Route::delete('/murid', [\App\Http\Controllers\MuridController::class, 'destroy'])->name('murid.destroy');
});
