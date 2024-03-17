<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Auth\LoginUser;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\RegisterUser;
use App\Http\Livewire\Users\UserComponent;
use App\Http\Livewire\Karyawan\KaryawanComponent;
use App\Http\Livewire\Pelanggan\PelangganComponent;
use App\Http\Livewire\Daftarpaket\DaftarPaketComponent;
use App\Http\Livewire\Paketwisata\PaketWisataComponent;
use App\Http\Livewire\Reservasi\ReservasiComponent;
use App\Http\Livewire\ReservasiPelangganComponent;
use App\Models\PaketWisata;

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
    $paketWisata = PaketWisata::orderBy('id', 'desc')->get();
    return view('welcome', [
        'paketWisata' => $paketWisata
    ]);
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/paketwisata/{id}', [PaketWisataComponent::class, 'detailPaket'])->name('detailPaket');
    Route::get('/paketWisata/all', [PaketWisataComponent::class, 'allPaket'])->name('allPaketWisata');

    Route::get('/reservasiPelanggan/{paketId}', ReservasiPelangganComponent::class)->name('reservasiPelanggan');
});

Auth::routes(["login" => false, "register" => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/users', UserComponent::class)->name('users');
    Route::get('/users/print_pdf', [UserComponent::class, 'printPdf'])->name('users.print');

    Route::get('/karyawan', KaryawanComponent::class)->name('karyawan');
    Route::get('/karyawan/print_pdf', [KaryawanComponent::class, 'printPdf'])->name('karyawan.print');
});

Route::middleware(['auth', 'isOperator'])->group(function () {
    Route::get('/paketwisata', PaketWisataComponent::class)->name('paketwisata');
    Route::get('/paketwisata/print_pdf', [PaketWisataComponent::class, 'printPdf'])->name('paketwisata.print');

    Route::get('/daftarpaket', DaftarPaketComponent::class)->name('daftarpaket');
    Route::get('/daftarpaket/print_pdf', [DaftarPaketComponent::class, 'printPdf'])->name('daftarpaket.print');
});

Route::middleware(['auth', 'isPelanggan'])->group(function () {
    Route::get('/pelanggan', PelangganComponent::class)->name('pelanggan');
    Route::get('/pelanggan/print_pdf', [PelangganComponent::class, 'printPdf'])->name('pelanggan.print');
});

Route::middleware(['auth', 'isReservasi'])->group(function () {
    Route::get('/reservasi', ReservasiComponent::class)->name('reservasi');
    Route::get('/reservasi/print_pdf', [ReservasiComponent::class, 'printPdf'])->name('reservasi.print');
});

// Route::middleware(['auth', 'isPemilik'])->group(function () {
//     Route::get('/users', UserComponent::class)->name('users');
//     Route::get('/karyawan', KaryawanComponent::class)->name('karyawan');
//     Route::get('/pelanggan', PelangganComponent::class)->name('pelanggan');
//     Route::get('/paketwisata', PaketWisataComponent::class)->name('paketwisata');
//     Route::get('/daftarpaket', DaftarPaketComponent::class)->name('daftarpaket');
//     Route::get('/reservasi', ReservasiComponent::class)->name('reservasi');
// });

Route::get('/404', function() {
    return view('layouts.components.forb');
})->name('forb');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', LoginUser::class)->name('login');
    Route::get('/register', RegisterUser::class)->name('register');
});
