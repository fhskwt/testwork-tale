<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Создание таблицы product_option_store с указанными полями
    public function up(): void
    {
        Schema::create('product_option_store', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('option_id')->nullable()->constrained()->nullOnDelete();
            $table->string('code_1c', 100);
        });
    }

    // Удаление таблицы product_option_store
    public function down(): void
    {
        Schema::dropIfExists('product_option_store');
    }
};
