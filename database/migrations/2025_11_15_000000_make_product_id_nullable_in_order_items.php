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
        Schema::table('order_items', function (Blueprint $table) {
            // Remover a constraint estrangeira existente
            $table->dropForeign(['product_id']);
            
            // Modificar a coluna para nullable
            $table->unsignedBigInteger('product_id')->nullable()->change();
            
            // Adicionar a constraint estrangeira novamente, mas com onDelete('set null')
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->unsignedBigInteger('product_id')->change();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }
};
