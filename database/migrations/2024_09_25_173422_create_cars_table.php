<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('brand'); // Merek mobil
            $table->string('model'); // Model mobil
            $table->string('plate_number')->unique(); // Nomor plat mobil
            $table->decimal('rental_rate', 10, 2); // Tarif sewa per hari
            $table->boolean('is_available')->default(true); // Status ketersediaan mobil
            $table->string('image')->nullable(); // URL atau path gambar mobil, jika ada
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
        Schema::dropIfExists('cars');
    }
}
