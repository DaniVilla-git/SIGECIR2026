<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'id_usuario')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('id_usuario')
                    ->nullable()
                    ->unique()
                    ->constrained('usuarios')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'id_usuario')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['id_usuario']);
                $table->dropUnique(['id_usuario']);
                $table->dropColumn('id_usuario');
            });
        }
    }
};