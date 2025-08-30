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

            //Chaves
            $table->id();
            $table->foreignId('order_id')->constrained();

            //Colunas
            $table->integer('qty');
            $table->float('unitary_price', 2);

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
