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
        Schema::create('units', function (Blueprint $table) {
          
            $table->uuid('id')->primary();
            $table->uuid('token_company'); 
            $table->uuid('emitente')->nullable();
             

            $table->string("nome",50);
            $table->string("sigla",50);
            $table->string("description",50)->nullable();

            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
