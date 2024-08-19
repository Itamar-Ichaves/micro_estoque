<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'token_company',
        'emitente',
        'status_uuid',
        'tipo_produto_uuid',
        'category_uuid',
        'localizacao_uuid',
        'unit_uuid',
        'sku',
        'nome',
        'gtin',
        'codigo_barra',
        'gtin_trib',
        'imagem',
        'origem',
        'usa_grade',
        'referencia',
        'qtde_venda',
        'fragmentacao_qtde',
        'fragmentacao_unidade',
        'fragmentacao_valor',
        'valor_venda_atacado',
        'valor_atacado_apartir',
        'comissao',
        'valor_maior',
        'valor_venda',
        'valor_custo',
        'margem_lucro',
        'custo_medio',
        'validade',
        'ultima_compra',
        'estoque_minimo',
        'estoque_maximo',
        'estoque_inicial',
        'estoque_atual',
        'cfop',
        'ncm',
        'cest',
        'cbenef',
        'indescala',
        'cnpjfabricante',
        'pDif',
        'pMVAST',
        'pRedBC',
        'pRedBCST',
        'pICMS',
        'pPIS',
        'pCOFINS',
        'pIPI',
        'aliquotapis',
        'aliquotacofins',
        'aliquotaipi',
        'tributado_icms',
        'tributado_ipi',
        'tributado_pis',
        'tributado_cofins',
        'unidade_tributavel',
        'quantidade_tributavel',
        'produto_loja',
        'produto_delivery',
        'controlar_estoque',
        'descricao',
        'destaque',
        'cep',
        'num_volume',
        'largura',
        'comprimento',
        'altura',
        'peso_liquido',
        'peso_bruto',
    ];

}
