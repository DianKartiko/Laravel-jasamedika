<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade'); // ID penyewaan yang dikembalikan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID pengguna yang mengembalikan
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade'); // ID mobil yang dikembalikan
            $table->date('return_date'); // Tanggal pengembalian mobil
            $table->integer('total_days'); // Total hari penyewaan
            $table->decimal('total_cost', 10, 2); // Total biaya sewa berdasarkan durasi
            $table->enum('status', ['returned', 'late'])->default('returned'); // Status pengembalian
            $table->timestamps(); // Created at dan updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returns');
    }
}
