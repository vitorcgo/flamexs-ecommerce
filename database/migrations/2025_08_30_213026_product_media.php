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

            //Colunas para armazenar imagem no banco
            $table->longText('image_data'); // Para armazenar a imagem em base64
            $table->string('mime_type', 50); // Para armazenar o tipo MIME (image/jpeg, image/png, image/webp)
            $table->string('original_name', 255)->nullable(); // Nome original do arquivo
            $table->integer('file_size')->nullable(); // Tamanho do arquivo em bytes

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
