<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReturn extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan jika tidak sesuai dengan konvensi
    protected $table = 'returns';

    // Kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'rental_id',
        'user_id',
        'car_id',
        'return_date',
        'total_days',
        'total_cost',
        'status',
    ];

    /**
     * Relasi ke model Rental
     * Setiap pengembalian terkait dengan satu penyewaan.
     */
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    /**
     * Relasi ke model User
     * Setiap pengembalian dilakukan oleh satu pengguna.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Car
     * Setiap pengembalian terkait dengan satu mobil.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
