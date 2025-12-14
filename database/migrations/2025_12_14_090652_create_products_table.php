<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Создание таблицы products с указанными полями
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });
    }

    // Удаление таблицы products
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
