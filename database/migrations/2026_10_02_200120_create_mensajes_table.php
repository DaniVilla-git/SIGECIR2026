<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje');
            $table->string('tipo_emisor');
            $table->date('fecha_mensaje');
            $table->unsignedBigInteger('id_cita');
            $table->foreign('id_cita')->references('id')->on('citas');
            $table->unsignedBigInteger('id_profesional');
            $table->foreign('id_profesional')->references('id')->on('profesionales');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
