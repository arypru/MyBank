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
            $table->dateTime("ultima_conexion");
            $table->string("ip");
            $table->string("nombre_equipo");
            $table->string("sistema_operativo");

            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')
                ->on('users');

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
