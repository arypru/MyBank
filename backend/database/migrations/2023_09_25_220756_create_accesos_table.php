<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //nombre del equipo
    //sistema operativo
    //direccion IP
    // usuario id
    //fechaa y hora (ultima conexion)

    public function up(): void
    {
        Schema::create('accesos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("ultima_conexion");
            $table->string("ip");

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->unsignedBigInteger('devices_id')->unique();
            $table->foreign('devices_id')->references('id')
                ->on('devices');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesos');
    }
};
