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
        Schema::create('orders', function (Blueprint $table) {
            //Chaves
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            //Colunas
            $table->decimal('total_amount', 10, 2);
            $table->timestamp('order_data');
            $table->string('status')->default('pending'); // Status Possiveis: pending, processing, shipped, delivered, cancelled


            //Campos de Controle do Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
