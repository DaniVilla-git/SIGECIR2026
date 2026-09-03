<?php

use App\Models\profesionales;
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
        Schema::create('horarios_profesionals', function (Blueprint $table) {
            $table->id();
            $table->date('dia_semana');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedBigInteger('id_profesional');
            $table->foreign('id_profesional')->references('id')->on('profesionales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_profesionals');
    }
};
