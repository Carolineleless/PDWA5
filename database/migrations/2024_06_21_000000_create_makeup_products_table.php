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
        Schema::create('makeup_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name'); // Nome do produto
            $table->string('product_type'); // Tipo de produto
            $table->string('brand'); // Marca
            $table->decimal('price', 8, 2); // Preco
            $table->text('ingredients'); // Ingredientes
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makeup_products');
    }
};
