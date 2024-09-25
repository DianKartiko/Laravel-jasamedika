<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home.index'); // Mengarahkan ke view 'index.blade.php' di dalam folder 'home'
    }
}
