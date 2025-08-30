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

            //Chaves Utilizadas na Tabela
            $table->id();
            $table->foreignId('card_id')->constrained();
            $table->foreignId('product_id')->constrained();

            //Colunas da Tabela User
            $table->interger('qty');

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
