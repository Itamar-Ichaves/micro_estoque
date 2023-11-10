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
        Schema::create('stock_entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("location_uuid");
            $table->string("product_uuid");
            $table->uuid('uuid')->unique();
            $table->string('token_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_entries');
    }
};
