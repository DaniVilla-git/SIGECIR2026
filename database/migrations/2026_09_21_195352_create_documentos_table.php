<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_documento');
            $table->string('tipo_documento');
            $table->string('ruta_documento');
            $table->date('fecha_documento');
            $table->string('estado_documento');
            $table->text('observacion_documento')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
