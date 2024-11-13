<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'produtos';

     // Chave primária como UUID
     protected $keyType = 'string';

     public $incrementing = false;

    protected $fillable = [
        'token_company', // Identificador da empresa (multi-tenant)
        'token_loja', // Identificador da loja (multi-tenant)
        'category_uuid', // Identificador da categoria (multi-tenant)
        'group_uuid', // Identificador do grupo (multi-tenant)
        'cProd', // Código do produto (tag <cProd>)
        'xProd', // Descrição do produto (tag <xProd>)
        'NCM', // Código NCM (tag <NCM>)
        'CEST', // Código CEST (tag <CEST>, opcional)
        'uCom', // Unidade de medida (tag <uCom>)
        'qCom', // Quantidade comercial (tag <qCom>)
        'vUnCom', // Valor unitário (tag <vUnCom>)
        'vProd', // Valor total (tag <vProd>)
        'vDesc', // Valor do desconto (tag <vDesc>)
        'vFrete', // Valor do frete (tag <vFrete>)
        'vSeg', // Valor do seguro (tag <vSeg>)
        'vOutro', // Outras despesas (tag <vOutro>)
        'CFOP', // CFOP (tag <CFOP>)
        'cEAN', // Código EAN (tag <cEAN>)
        'orig', // Origem do produto (tag <orig>)
        'modBC', // Modalidade de ICMS (tag <modBC>)
        'pICMS', // Alíquota de ICMS (tag <pICMS>)
        'vICMS', // Valor do ICMS (tag <vICMS>)
        'pIPI', // Alíquota de IPI (tag <pIPI>)
        'vIPI', // Valor do IPI (tag <vIPI>)
        'pPIS', // Alíquota de PIS (tag <pPIS>)
        'vPIS', // Valor do PIS (tag <vPIS>)
        'pCOFINS', // Alíquota de COFINS (tag <pCOFINS>)
        'vCOFINS', // Valor do COFINS (tag <vCOFINS>)
    ];

}
