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
        Schema::create('payments', function (Blueprint $table) {
            //Chaves
            $table->id();
            $table->foreignId('order_id')->unique()->constrained()->onDelete('cascade');

            //Coluna
            $table->string('payment_method');
            $table->string('status');
            $table->float('total_value');
            $table->timestamp('payment_data');


            //Campos de Controle do Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
