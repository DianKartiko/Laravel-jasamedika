<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID pengguna yang menyewa
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade'); // ID mobil yang disewa
            $table->date('start_date'); // Tanggal mulai peminjaman
            $table->date('end_date'); // Tanggal selesai peminjaman
            $table->decimal('total_cost', 10, 2)->nullable(); // Total biaya sewa
            $table->enum('status', ['ongoing', 'completed', 'canceled'])->default('ongoing'); // Status peminjaman
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
        Schema::dropIfExists('rentals');
    }
}
