<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    /**
     * Menampilkan daftar penyewaan.
     */
    public function index()
    {
        $rentals = Rental::with('car', 'user')->get();
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Menampilkan form penyewaan mobil.
     */
    public function create()
    {
        $cars = Car::where('is_available', true)->get();
        return view('rentals.rent', compact('cars'));
    }

    /**
     * Menyimpan data penyewaan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $car = Car::find($request->car_id);
        $totalDays = $request->start_date->diffInDays($request->end_date) + 1;
        $totalCost = $car->rental_rate * $totalDays;

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $totalCost,
        ]);

        $car->update(['is_available' => false]);

        return redirect()->route('rentals.index')->with('success', 'Mobil berhasil disewa.');
    }
}
