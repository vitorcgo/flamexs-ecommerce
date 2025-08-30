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
        Schema::create('products', function (Blueprint $table) {
            //Chaves
            $table->id();

            //Colunas
            $table->string('name');
            $table->float('price');
            $table->string('status');
            $table->string('description');
            $table->integer('stock');
            $table->string('details');
            
            //Avaliar Necessidade de criacao de outra tabela
            $table->string('category');
            $table->string('color');
            $table->string('size');

            //Campos de Controle do Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('products');
    }
};
