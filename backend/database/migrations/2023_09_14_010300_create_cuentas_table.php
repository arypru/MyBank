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
            $table->id();

            $table->bigInteger('CBU');
            $table->string('alias');
            $table->boolean('isFavorita');
            $table->boolean('isCuentaPropia');

            //informacion del saldo
            $table->bigInteger('saldo_disponible')->default(0.00);
            $table->bigInteger('saldo_bloqueado')->default(0.00);

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
