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
        Schema::create('AddCamposEstoqueProduto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->string('token_company');
            $table->integer("inventory_initial")->default(0);
            $table->integer("stock_minimum")->default(0);
            $table->integer("stock_store")->default(0);
            $table->integer("stock_current")->default(0);
            $table->integer("reserve_stock")->default(0);
            $table->integer("stock_real")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_campos_estoque_produtos');
    }
};
