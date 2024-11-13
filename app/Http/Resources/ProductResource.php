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
            'id' => $this->id,
            'token_company' => $this->token_company,
            'token_loja' => $this->token_loja,
            'codigo_produto' => $this->cProd,
            'descricao_produto' => $this->xProd,
            'ncm' => $this->NCM,
            'cest' => $this->CEST,
            'unidade' => $this->uCom,
            'quantidade' => $this->qCom,
            'valor_unitario' => $this->vUnCom,
            'valor_total' => $this->vProd,
            'valor_desconto' => $this->vDesc,
            'valor_frete' => $this->vFrete,
            'valor_seguro' => $this->vSeg,
            'outras_despesas' => $this->vOutro,
            'cfop' => $this->CFOP,
            'codigo_ean' => $this->cEAN,
            'origem' => $this->orig,
            'modalidade_bc_icms' => $this->modBC,
            'aliquota_icms' => $this->pICMS,
            'valor_icms' => $this->vICMS,
            'aliquota_ipi' => $this->pIPI,
            'valor_ipi' => $this->vIPI,
            'aliquota_pis' => $this->pPIS,
            'valor_pis' => $this->vPIS,
            'aliquota_cofins' => $this->pCOFINS,
            'valor_cofins' => $this->vCOFINS,
        ];
    }
}
