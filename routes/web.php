<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\SupervisiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\JadwalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function () {
    return redirect()->route('login')->name('register');
});

Auth::routes();

Route::prefix('guru')->middleware('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('guru');
    Route::get('/jadwal', [GuruController::class, 'jadwal'])->name('jadwal.guru');
    Route::post('/', [GuruController::class, 'store'])->name('berkas.store');
    Route::get('/{id}', [GuruController::class, 'destroy'])->name('berkas.destroy');
});

Route::prefix('supervisor')->middleware('guru')->group(function () {
    Route::get('/', [SupervisorController::class, 'index']);
    Route::get('/supervisi/{id}', [SupervisorController::class, 'supervisi'])->name('supervisi');
    Route::post('/supervisi/{id}', [SupervisiController::class, 'store'])->name('supervisi.store');
    Route::get('/download/{id}/{ket}', [SupervisorController::class, 'download']);
});

Route::prefix('kurikulum')->middleware('kurikulum')->group(function () {
    Route::get('/', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::get('/rekap', [KurikulumController::class, 'rekap'])->name('rekap');
    Route::get('/berkas', [KurikulumController::class, 'berkas'])->name('berkas');
    Route::get('/berkas/{id}', [KurikulumController::class, 'destroy'])->name('berkas2.destroy');
    Route::post('/', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal', [KurikulumController::class, 'jadwal']);
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::get('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    Route::get('/register', function () {
        return view('kurikulum.register');
    });
    Route::post('/register', [KurikulumController::class, 'register'])->name('register');
});

Route::prefix('kepsek')->middleware('kepsek')->group(function () {
    Route::get('/', [KepsekController::class, 'index']);
    Route::get('/hasil', [KepsekController::class, 'rekap']);
});
