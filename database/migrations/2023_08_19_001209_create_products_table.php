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
            $table->uuid('token_company'); // Identificador da empresa (multi-tenant)
            $table->uuid('token_loja')->nullable();
            
            //relashionship
            $table->uuid('category_uuid')->nullable();
            $table->uuid('group_uuid')->nullable();

            // Identificação do Produto
            $table->string('cProd', 60); // Código do produto (tag <cProd>)
            $table->string('xProd', 120); // Descrição do produto (tag <xProd>)
            $table->string('NCM', 8); // Código NCM (tag <NCM>)
            $table->string('CEST', 7)->nullable(); // Código CEST (tag <CEST>, opcional)
            $table->string('uCom', 6); // Unidade de medida (tag <uCom>, ex: UN, KG)
            $table->decimal('qCom', 10, 3); // Quantidade comercial (tag <qCom>)
            $table->decimal('vUnCom', 15, 2); // Valor unitário (tag <vUnCom>)
            $table->decimal('vProd', 15, 2); // Valor total do produto (tag <vProd>)
            $table->decimal('vDesc', 15, 2)->default(0); // Valor do desconto (tag <vDesc>)
            $table->decimal('vFrete', 15, 2)->default(0); // Valor do frete (tag <vFrete>)
            $table->decimal('vSeg', 15, 2)->default(0); // Valor do seguro (tag <vSeg>)
            $table->decimal('vOutro', 15, 2)->default(0); // Outras despesas (tag <vOutro>)
            $table->string('CFOP', 4); // CFOP (Código Fiscal de Operações e Prestações) (tag <CFOP>)
            $table->string('cEAN', 13)->nullable(); // Código EAN do produto (tag <cEAN>, opcional)
            $table->string('orig', 1); // Origem do produto (tag <orig>, 0-Nacional, 1-Estrangeira)

            // Impostos
            $table->string('modBC', 2); // Modalidade de BC do ICMS (tag <modBC>)
            $table->decimal('pICMS', 5, 2); // Alíquota do ICMS (tag <pICMS>)
            $table->decimal('vICMS', 15, 2)->default(0); // Valor do ICMS (tag <vICMS>)
            $table->decimal('pIPI', 5, 2)->nullable(); // Alíquota de IPI (tag <pIPI>)
            $table->decimal('vIPI', 15, 2)->default(0); // Valor do IPI (tag <vIPI>)
            $table->decimal('pPIS', 5, 2)->nullable(); // Alíquota de PIS (tag <pPIS>)
            $table->decimal('vPIS', 15, 2)->default(0); // Valor do PIS (tag <vPIS>)
            $table->decimal('pCOFINS', 5, 2)->nullable(); // Alíquota de COFINS (tag <pCOFINS>)
            $table->decimal('vCOFINS', 15, 2)->default(0); // Valor do COFINS (tag <vCOFINS>)

            $table->timestamps();

            // Índices para melhorar a consulta, se necessário
            $table->index(['token_company', 'cProd']);
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
