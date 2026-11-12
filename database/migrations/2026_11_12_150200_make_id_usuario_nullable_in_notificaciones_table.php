<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar la migración.
     */
    public function up(): void
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario')
                  ->nullable()
                  ->change();
        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario')
                  ->nullable(false)
                  ->change();
        });
    }
};
