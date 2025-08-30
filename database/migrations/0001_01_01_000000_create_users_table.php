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
        Schema::create('users', function (Blueprint $table) {

            //Chaves Utilizadas na Tabela
            $table->id();
            $table->foreignId('address_id')->constrained();

            //Colunas da Tabela User
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 14)->unique();
            $table->string('phone');
            $table->timestamp('last_access_date');

            //Marca do tempo
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
