<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('profesionales', 'id_user')) {
            Schema::table('profesionales', function (Blueprint $table) {
                $table->foreignId('id_user')
                    ->nullable()
                    ->unique()
                    ->constrained('users')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('profesionales', 'id_user')) {
            Schema::table('profesionales', function (Blueprint $table) {
                $table->dropForeign(['id_user']);
                $table->dropUnique(['id_user']);
                $table->dropColumn('id_user');
            });
        }
    }
};

