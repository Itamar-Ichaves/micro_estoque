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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('token_company'); 
            $table->uuid('emitente')->nullable();  

            $table->string('nome', 50);
            $table->string('gtin', 20)->nullable();
            $table->string('codigo_barra', 20)->nullable();
            $table->string('sku', 20)->nullable();
            $table->string('gtin_trib', 20)->nullable();
            $table->string('imagem')->nullable();    
            $table->string('origem', 10)->nullable();
            $table->string('usa_grade')->nullable();

            $table->uuid('status_uuid')->nullable();
            $table->uuid('tipo_produto_uuid')->nullable();
            $table->uuid('category_uuid')->nullable();            
            $table->uuid('localizacao_uuid')->nullable();
            $table->uuid('unit_uuid')->nullable();
            $table->decimal('perc_gni', 10, 2)->nullable()->default(0);
            $table->decimal('valor_partida', 10, 2)->nullable()->default(0);
            $table->decimal('perc_gnn', 10, 2)->nullable()->default(0);
            $table->decimal('perc_glp', 10, 2)->nullable()->default(0);

            $table->string('codigo_anp', 10)->nullable();
            $table->string('unidade_pdv', 10)->nullable();
            $table->string('referencia', 50)->nullable();

            $table->decimal('qtde_venda', 10, 2)->nullable()->default(0);
            $table->decimal('fragmentacao_qtde', 10, 2)->nullable()->default(0);
            $table->string('fragmentacao_unidade', 10)->nullable();
            $table->decimal('fragmentacao_valor', 10, 2)->nullable()->default(0);

            $table->decimal('valor_venda_atacado', 10, 2)->nullable()->default(0);
            $table->decimal('valor_atacado_apartir', 10, 2)->nullable()->default(0);
            $table->decimal('comissao', 10, 2)->nullable()->default(0);
            $table->decimal('valor_maior', 10, 2)->nullable()->default(0);
            $table->decimal('valor_venda', 10, 2)->nullable()->default(0);
            $table->decimal('valor_custo', 10, 2)->nullable()->default(0);
            $table->decimal('margem_lucro', 10, 2)->nullable()->default(0);
            $table->decimal('custo_medio', 10, 2)->nullable()->default(0);

            $table->date('validade')->nullable();
            $table->date('ultima_compra')->nullable();

            $table->decimal('estoque_minimo', 10, 2)->nullable()->default(0);
            $table->decimal('estoque_maximo', 10, 2)->nullable()->default(0);
            $table->decimal('estoque_inicial', 10, 2)->nullable()->default(0);
            $table->decimal('estoque_atual', 10, 2)->nullable()->default(0);           

            $table->string('cfop', 15)->nullable();            
            $table->string('ncm', 13)->nullable();
            $table->string('cest', 7)->nullable();
            $table->string('cbenef', 10)->nullable();
            $table->string('indescala')->nullable();
            $table->string('cnpjfabricante', 20)->nullable();

            $table->decimal('pDif', 10, 2)->nullable();
            $table->decimal('pMVAST', 10, 2)->nullable();
            $table->decimal('pRedBC', 10, 2)->nullable();
            $table->decimal('pRedBCST', 10, 2)->nullable();
            $table->decimal('pICMS', 10, 2)->nullable();
            $table->decimal('pPIS', 10, 2)->nullable();
            $table->decimal('pCOFINS', 10, 2)->nullable();
            $table->decimal('pIPI', 10, 2)->nullable();
            $table->decimal('aliquotapis', 10, 2)->nullable();
            $table->decimal('aliquotacofins', 10, 2)->nullable();
            $table->decimal('aliquotaipi', 10, 2)->nullable();
            $table->string('tributado_icms')->default('S')->nullable();
            $table->string('tributado_ipi')->default('S')->nullable();
            $table->string('tributado_pis')->default('S')->nullable();
            $table->string('tributado_cofins')->default('S')->nullable();

            $table->string('unidade_tributavel')->default('');
            $table->decimal('quantidade_tributavel', 10, 2)->default(0);

            // Dados da Loja
            $table->string('produto_loja')->default('N');
            $table->string('produto_delivery')->default('N');            
            $table->string('controlar_estoque')->default('S');

            $table->text('descricao')->nullable();          
            $table->string('destaque', 1)->nullable()->default('N');            
            $table->string('cep')->nullable()->default('');

            $table->integer('num_volume')->nullable();
            $table->decimal('largura', 6, 2)->nullable()->default(0);
            $table->decimal('comprimento', 6, 2)->nullable()->default(0);
            $table->decimal('altura', 6, 2)->nullable()->default(0);
            $table->decimal('peso_liquido', 8, 3)->nullable()->default(0);
            $table->decimal('peso_bruto', 8, 3)->nullable()->default(0);

            $table->timestamps();

            // Chaves estrangeiras
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
