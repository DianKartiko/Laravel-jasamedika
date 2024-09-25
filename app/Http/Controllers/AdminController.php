<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use App\Models\Rental;
use App\Models\CarReturn;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function dashboard()
    {
        $usersCount = User::count();
        $carsCount = Car::count();
        $rentalsCount = Rental::count();
        return view('admin.dashboard', compact('usersCount', 'carsCount', 'rentalsCount'));
    }

    /**
     * Menampilkan halaman manajemen pengguna.
     */
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage_users', compact('users'));
    }

    /**
     * Menampilkan halaman manajemen mobil.
     */
    public function manageCars()
    {
        $cars = Car::all();
        return view('admin.manage_cars', compact('cars'));
    }

    /**
     * Menampilkan daftar penyewaan.
     */
    public function manageRentals()
    {
        $rentals = Rental::with('car', 'user')->get();
        return view('admin.rentals', compact('rentals'));
    }

    /**
     * Menampilkan daftar pengembalian.
     */
    public function manageReturns()
    {
        $returns = CarReturn::with('rental', 'user', 'car')->get();
        return view('admin.returns', compact('returns'));
    }
}
