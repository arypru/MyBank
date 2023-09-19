<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_cuentas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('acronimo');
            $table->string('descripcion');
            $table->unsignedBigInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')
                ->on('monedas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_cuentas');
    }
};
