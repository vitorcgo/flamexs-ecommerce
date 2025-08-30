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

            //Chaves
            $table->id();

            //Colunas
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 14)->unique();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('phone')->unique();
            $table->timestamp('last_login_at');

            //Campos de Controle do Laravel
            $table->rememberToken(); // Para a funcionalidade "Lembrar-me"
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
