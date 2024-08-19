<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, // Identificador único do produto
            'token_company' => $this->token_company, // Token da empresa
            'emitente' => $this->emitente, // Emitente
            'nome' => $this->nome, // Nome do produto
            'gtin' => $this->gtin, // Código GTIN
            'codigo_barra' => $this->codigo_barra, // Código de barras
            'sku' => $this->sku, // SKU do produto
            'gtin_trib' => $this->gtin_trib, // GTIN de tributação
            'imagem' => $this->imagem ? url("storage/{$this->imagem}") : null, // URL da imagem do produto
            'origem' => $this->origem, // Origem do produto
            'usa_grade' => $this->usa_grade, // Usa grade (se aplicável)
            'status_uuid' => $this->status_uuid, // UUID do status
            'tipo_produto_uuid' => $this->tipo_produto_uuid, // UUID do tipo de produto
            'category_uuid' => $this->category_uuid, // UUID da categoria
            'localizacao_uuid' => $this->localizacao_uuid, // UUID da localização
            'unit_uuid' => $this->unit_uuid, // UUID da unidade
            'unidade_pdv' => $this->unidade_pdv, // Unidade de ponto de venda
            'referencia' => $this->referencia, // Referência do produto
            'qtde_venda' => $this->qtde_venda, // Quantidade de venda
            'fragmentacao_qtde' => $this->fragmentacao_qtde, // Quantidade de fragmentação
            'fragmentacao_unidade' => $this->fragmentacao_unidade, // Unidade de fragmentação
            'fragmentacao_valor' => $this->fragmentacao_valor, // Valor de fragmentação
            'valor_venda_atacado' => $this->valor_venda_atacado, // Valor de venda no atacado
            'valor_atacado_apartir' => $this->valor_atacado_apartir, // Valor de atacado a partir de
            'comissao' => $this->comissao, // Comissão
            'valor_maior' => $this->valor_maior, // Valor maior
            'valor_venda' => $this->valor_venda, // Valor de venda
            'valor_custo' => $this->valor_custo, // Valor de custo
            'margem_lucro' => $this->margem_lucro, // Margem de lucro
            'custo_medio' => $this->custo_medio, // Custo médio
            'validade' => $this->validade, // Data de validade
            'ultima_compra' => $this->ultima_compra, // Data da última compra
            'estoque_minimo' => $this->estoque_minimo, // Estoque mínimo
            'estoque_maximo' => $this->estoque_maximo, // Estoque máximo
            'estoque_inicial' => $this->estoque_inicial, // Estoque inicial
            'estoque_atual' => $this->estoque_atual, // Estoque atual
            'cfop' => $this->cfop, // CFOP
            'ncm' => $this->ncm, // NCM
            'cest' => $this->cest, // CEST
            'cbenef' => $this->cbenef, // Cbenef
            'indescala' => $this->indescala, // Indicador de escala
            'cnpjfabricante' => $this->cnpjfabricante, // CNPJ do fabricante
            'pDif' => $this->pDif, // Percentual de diferença
            'pMVAST' => $this->pMVAST, // Percentual de MVA ST
            'pRedBC' => $this->pRedBC, // Percentual de redução da BC
            'pRedBCST' => $this->pRedBCST, // Percentual de redução da BC ST
            'pICMS' => $this->pICMS, // Percentual de ICMS
            'pPIS' => $this->pPIS, // Percentual de PIS
            'pCOFINS' => $this->pCOFINS, // Percentual de COFINS
            'pIPI' => $this->pIPI, // Percentual de IPI
            'aliquotapis' => $this->aliquotapis, // Alíquota de PIS
            'aliquotacofins' => $this->aliquotacofins, // Alíquota de COFINS
            'aliquotaipi' => $this->aliquotaipi, // Alíquota de IPI
            'tributado_icms' => $this->tributado_icms, // ICMS tributado
            'tributado_ipi' => $this->tributado_ipi, // IPI tributado
            'tributado_pis' => $this->tributado_pis, // PIS tributado
            'tributado_cofins' => $this->tributado_cofins, // COFINS tributado
            'unidade_tributavel' => $this->unidade_tributavel, // Unidade tributável
            'quantidade_tributavel' => $this->quantidade_tributavel, // Quantidade tributável
            'produto_loja' => $this->produto_loja, // Produto disponível na loja
            'produto_delivery' => $this->produto_delivery, // Produto disponível para delivery
            'controlar_estoque' => $this->controlar_estoque, // Controlar estoque
            'descricao' => $this->descricao, // Descrição do produto
            'destaque' => $this->destaque, // Produto em destaque
            'cep' => $this->cep, // CEP
            'num_volume' => $this->num_volume, // Número de volume
            'largura' => $this->largura, // Largura
            'comprimento' => $this->comprimento, // Comprimento
            'altura' => $this->altura, // Altura
            'peso_liquido' => $this->peso_liquido, // Peso líquido
            'peso_bruto' => $this->peso_bruto, // Peso bruto
        ];
    }
}
