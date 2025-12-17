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
        // Удаляем внешний ключ
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Затем удаляем колонку
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
