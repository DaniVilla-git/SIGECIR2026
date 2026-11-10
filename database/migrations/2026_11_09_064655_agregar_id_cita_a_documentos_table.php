<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cita')->nullable()->after('id_usuario');

            $table->foreign('id_cita')
                ->references('id')
                ->on('citas')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropForeign(['id_cita']);
            $table->dropColumn('id_cita');
        });
    }
};