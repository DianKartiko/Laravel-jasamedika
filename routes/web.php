<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CarReturnController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Autentikasi Pengguna
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Manajemen Mobil
Route::prefix('cars')->name('cars.')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('index'); // Daftar mobil
    Route::get('/create', [CarController::class, 'create'])->name('create'); // Form tambah mobil
    Route::post('/', [CarController::class, 'store'])->name('store'); // Simpan data mobil baru
    Route::get('/{car}/edit', [CarController::class, 'edit'])->name('edit'); // Form edit mobil
    Route::put('/{car}', [CarController::class, 'update'])->name('update'); // Update data mobil
    Route::delete('/{car}', [CarController::class, 'destroy'])->name('destroy'); // Hapus mobil
});

// Penyewaan Mobil
Route::prefix('rentals')->name('rentals.')->group(function () {
    Route::get('/', [RentalController::class, 'index'])->name('index'); // Daftar penyewaan
    Route::get('/create', [RentalController::class, 'create'])->name('create'); // Form penyewaan mobil
    Route::post('/', [RentalController::class, 'store'])->name('store'); // Simpan data penyewaan baru
    Route::get('/{rental}/return', [CarReturnController::class, 'create'])->name('return'); // Form pengembalian mobil
    Route::post('/{rental}/return', [CarReturnController::class, 'store'])->name('return.store'); // Simpan data pengembalian
});

// Halaman Admin
Route::prefix('admin')->name('admin.')->middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard'); // Dashboard admin
    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('manage_users'); // Kelola pengguna
    Route::get('/manage-cars', [AdminController::class, 'manageCars'])->name('manage_cars'); // Kelola mobil
    Route::get('/rentals', [AdminController::class, 'manageRentals'])->name('rentals'); // Kelola penyewaan
    Route::get('/returns', [AdminController::class, 'manageReturns'])->name('returns'); // Kelola pengembalian
});

// Profil dan Penyewaan Pengguna
Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile'); // Halaman profil pengguna
    Route::get('/my-rentals', [UserController::class, 'myRentals'])->name('my_rentals'); // Penyewaan saya
});
