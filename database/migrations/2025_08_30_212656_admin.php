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
        Schema::create('admins', function (Blueprint $table) {
            //Chaves
            $table->id();

            //Colunas
            $table->string('user')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status')->default('active');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamp('last_login_at')->nullable();
            
            //Campos de Controle do Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
