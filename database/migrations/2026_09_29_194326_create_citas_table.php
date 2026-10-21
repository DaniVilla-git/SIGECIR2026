<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('modalidad_cita');
            $table->string('consultorio');
            $table->date('fecha_cita');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado_cita');
            $table->text('observaciones_cita')->nullable();
            $table->date('fecha_creacion_cita');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->unsignedBigInteger('id_profesional');
            $table->foreign('id_profesional')->references('id')->on('profesionales');
            $table->unsignedBigInteger('id_servicios');
            $table->foreign('id_servicios')->references('id')->on('servicios');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
