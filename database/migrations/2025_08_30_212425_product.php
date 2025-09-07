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
            // Nome do produto
            $table->string('name');
            // Valor do produto
            $table->decimal('price', 8, 2);
            // Status do produto
            $table->string('status')->default('available');
            // Descricao do produto
            $table->string('description');
            // Estoque do produto
            $table->integer('stock')->default(0);
            // Descricao do produto
            $table->string('details')->nullable();
            // categoria do produto
            $table->string('category');
            
            //Avaliar Necessidade de criacao de outra tabela
            
            //$table->string('color');
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
