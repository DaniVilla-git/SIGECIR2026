<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificacion_profesional', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('id_notificacion');
            $table->unsignedBigInteger('id_profesional');

            $table->boolean('leida')->default(false);

            $table->timestamp('fecha_lectura')->nullable();

            $table->timestamps();

            $table->foreign('id_notificacion')
                ->references('id')
                ->on('notificaciones')
                ->onDelete('cascade');

            $table->foreign('id_profesional')
                ->references('id')
                ->on('profesionales')
                ->onDelete('cascade');

            $table->unique([
                'id_notificacion',
                'id_profesional'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificacion_profesional');
    }
};
