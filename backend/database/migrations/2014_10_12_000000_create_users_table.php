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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            //foreign key
            $table->unsignedBigInteger('persona_id')->unique();
            $table->foreign('persona_id')->references('id')
                ->on('personas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nombre_user')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('foto_perfil');
            $table->boolean('habilitado')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
