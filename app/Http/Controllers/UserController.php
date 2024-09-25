<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    /**
     * Menampilkan daftar penyewaan saya.
     */
    public function myRentals()
    {
        $rentals = Auth::user()->rentals()->with('car')->get();
        return view('users.my_rentals', compact('rentals'));
    }
}
