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
        Schema::create('cart_items', function (Blueprint $table) {

            //Chaves
            $table->id();
            $table->foreignId('card_id')->constrained();
            $table->foreignId('product_id')->constrained();

            //Colunas
            $table->integer('qty')->default(1);

            // Garante que não haja linhas duplicadas do mesmo produto no mesmo carrinho
            $table->unique(['cart_id', 'product_id']);

            //Marca do tempo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
