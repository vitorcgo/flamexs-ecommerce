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
        Schema::create('order_items', function (Blueprint $table) {

            //Chaves Utilizadas na Tabela
            $table->id();
            $table->foreignId('order_id')->constrained();

            //Colunas da Tabela User
            $table->interger('qty');
            $table->float('unitary_price', 8, 2);

            //Marca do tempo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
