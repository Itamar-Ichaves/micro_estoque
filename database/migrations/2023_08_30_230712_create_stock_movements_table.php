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
        Schema::create('stock_movements', function (Blueprint $table) {
           
            $table->uuid('id')->primary();
            $table->uuid('token_company'); 
            $table->uuid('emitente');   

            $table->string("location_uuid");
            $table->string("movement_type_uuid");
            $table->string("products_uuid");
            $table->string("order_purchase_uuid")->nullable();
            $table->string("request_uiid")->nullable();
            $table->string("single_entry_uiid")->nullable();
            $table->string("exit_avulsa_uuid")->nullable();
            $table->string("ent_sai",1);
            $table->date("date_movement");
            $table->integer("qtde_moviment");
            $table->decimal("movement_value",10,2)->default(0);
            $table->decimal("subtotal_movement",10,2)->default(0);
            $table->string("description");
            $table->integer("stock_balance");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
