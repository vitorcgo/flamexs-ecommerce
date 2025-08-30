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
        Schema::create('product_media', function (Blueprint $table) {

            //Chaves Utilizadas na Tabela
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            //Colunas da Tabela User
            $table->string('url', 2048);

            //Marca do tempo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_media');
    }
};
