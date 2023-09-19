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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->string('CBU');
            $table->string('alias');
            $table->integer('numeroCuenta')->unique();
            $table->boolean('isFavorita')->default(false);
            $table->boolean('isCuentaPropia')->default(false);

            //informacion del saldo
            $table->decimal('saldoDisponible',8,2)->default(00000000.00);
            $table->decimal('saldoBloqueado',8,2)->default(00000000.00);

            //titular
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')
                ->on('personas');

            //banco de donde es la cuenta
            $table->unsignedBigInteger('banco_id');
            $table->foreign('banco_id')->references('id')
                ->on('bancos');

            $table->unsignedBigInteger('tipocuenta_id');
            $table->foreign('tipocuenta_id')->references('id')
                ->on('tipo_cuentas');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')
                ->on('estados');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
