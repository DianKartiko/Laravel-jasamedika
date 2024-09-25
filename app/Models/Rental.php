<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarReturn; // Menggunakan model CarReturn

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_cost',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    /**
     * Relasi ke model CarReturn
     * Setiap penyewaan dapat memiliki satu pengembalian.
     */
    public function carReturn()
    {
        return $this->hasOne(CarReturn::class); // Relasi ke CarReturn
    }
}
