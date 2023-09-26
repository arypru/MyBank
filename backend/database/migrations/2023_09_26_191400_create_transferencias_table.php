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
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();

            //informacion usuario origen
            $table->unsignedBigInteger('usuario_origen_id');
            $table->foreign('usuario_origen_id')->references('id')
                ->on('users');

            $table->unsignedBigInteger('cuenta_origen_id');
            $table->foreign('cuenta_origen_id')->references('id')
                ->on('cuentas');


            //informacion usuario destino
            $table->unsignedBigInteger('usuario_dest_id');
            $table->foreign('usuario_dest_id')->references('id')
                ->on('users');

            $table->unsignedBigInteger('cuenta_dest_id');
            $table->foreign('cuenta_dest_id')->references('id')
                ->on('cuentas');

            //informacion de la transaccion
            //Tipo: TRANFERENCIA A MISMAS CUENTAS TRANSFERNCIA A TERCEROS

            $table->set('tipo_transaccion', ['Transf. a mi mismo', 'Transf. a terceros']);
            $table->string('referencia');
            $table->string('descripcion');

            $table->unsignedBigInteger('moneda_id')->unique();
            $table->foreign('moneda_id')->references('id')
                ->on('monedas');

            $table->decimal('importe',8,2);

            $table->dateTime('fecha_op');
            $table->set('estado', ['ACEPTADO', 'RECHAZADO','EN PROCESO'])->default('EN PROCESO');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferencias');
    }
};
