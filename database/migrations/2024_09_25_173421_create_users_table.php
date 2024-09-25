<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik untuk login
            $table->string('password'); // Password untuk autentikasi
            $table->string('address')->nullable(); // Alamat pengguna
            $table->string('phone_number')->nullable(); // Nomor telepon pengguna
            $table->string('license_number')->nullable(); // Nomor SIM pengguna
            $table->enum('role', ['admin', 'user'])->default('user'); // Peran pengguna (admin/user)
            $table->timestamp('email_verified_at')->nullable(); // Tanggal verifikasi email
            $table->rememberToken(); // Token untuk remember me
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
        Schema::dropIfExists('users');
    }
}
