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
        Schema::create('product_locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->string('token_company');    
            $table->string("product_uuid");
            $table->string("location_uuid");
            $table->integer("stock")->default(0);
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_locations');
    }
};
