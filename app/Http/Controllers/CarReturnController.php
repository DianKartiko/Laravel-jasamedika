<?php

namespace App\Http\Controllers;

use App\Models\CarReturn;
use App\Models\Rental;
use Illuminate\Http\Request;

class CarReturnController extends Controller
{
    /**
     * Menampilkan form pengembalian mobil.
     */
    public function create(Rental $rental)
    {
        return view('rentals.return', compact('rental'));
    }

    /**
     * Menyimpan data pengembalian mobil.
     */
    public function store(Request $request, Rental $rental)
    {
        $request->validate([
            'return_date' => 'required|date|after_or_equal:' . $rental->end_date,
        ]);

        $totalDays = $rental->start_date->diffInDays($request->return_date) + 1;
        $totalCost = $totalDays * $rental->car->rental_rate;

        CarReturn::create([
            'rental_id' => $rental->id,
            'user_id' => $rental->user_id,
            'car_id' => $rental->car_id,
            'return_date' => $request->return_date,
            'total_days' => $totalDays,
            'total_cost' => $totalCost,
            'status' => 'returned',
        ]);

        $rental->car->update(['is_available' => true]);
        $rental->update(['status' => 'completed']);

        return redirect()->route('rentals.index')->with('success', 'Mobil berhasil dikembalikan.');
    }
}
