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
        Schema::create('stock_outputs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid')->unique();
            $table->string('token_company');

            $table->string("product_uuid");
            $table->string("location_uuid");
            $table->integer("qtde_output")->default(1);
            $table->decimal("output_value")->default(0);
            $table->decimal("subtotal_output",5,2);
            $table->date("output_date");
            
           
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_outputs');
    }
};
