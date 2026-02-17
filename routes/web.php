<?php

use Illuminate\Support\Facades\Route;
// --- Frontend Controllers ---
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\BeritaController;

// --- Auth Controller ---
use App\Http\Controllers\AuthController;

// --- Admin Controllers ---
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InfografisController as AdminInfografisController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes - Frontend (Public)
|--------------------------------------------------------------------------
*/

// Halaman Beranda
// (Menggunakan BerandaController dari kode pertama, lebih rapi)
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Halaman Profil Desa
// (Menggunakan '/profile' dari kode pertama, agar konsisten)
Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');

// Halaman Infografis (Public)
// (Menggunakan InfografisController dari kode pertama, lebih rapi)
Route::get('/infografis', [InfografisController::class, 'index'])->name('infografis');

// Halaman Berita (Public)
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

/*
|--------------------------------------------------------------------------
| Web Routes - Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Web Routes - Admin Panel (Protected)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Data Infografis
    Route::get('/infografis/edit', [AdminInfografisController::class, 'edit'])->name('infografis.edit');
    Route::put('/infografis/update', [AdminInfografisController::class, 'update'])->name('infografis.update');

    // Kelola Data User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Kelola Berita
    // (Menggunakan AdminBeritaController yang sudah di-alias)
    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [AdminBeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita/store', [AdminBeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [AdminBeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}/update', [AdminBeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}/destroy', [AdminBeritaController::class, 'destroy'])->name('berita.destroy');
});
