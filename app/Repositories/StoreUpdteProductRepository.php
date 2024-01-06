<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class StoreUpdteProductRepository
{

    protected $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function createProducts($products)
    {
     dd($products);
        
        $data = [

            'nome' => $products['nome'],
            'category' => $products['category_uuid'],
            'unit_uuid' => $products['unit_uuid'],
            'token_company' => $products['token_company'],
            'sku' => $products['sku'],
            'price' => $products['price'],
            'cfop_interno' => $products['cfop_interno'],
            'cfop_externo' => $products['cfop_externo'],
            'cst_csosn' => $products['cst_csosn'],
            'cst_pis' => $products['cst_pis'],
            'cst_cofins'  => $products['cst_cofins'],
            'cst_ipi'   => $products['cst_ipi'],
            'ncm'    => $products['ncm'],
            'cest'   => $products['cest'],
            'bar_code'  => $products['bar_code'],
            'anp_code'   => $products['anp_code'],
            'perc_glp'   => $products['perc_glp'],
            //'perc_gnn'   => $products['perc_gnn '],
            'perc_gni'  => $products['perc_gni']

        ];
        //dd($data);
       $products = $this->entity->create($data);
       return $products;

        //dd($data);
    }

    function updateProductsByTenant($identify, $products)
    {

        $this->entity->update($products);

        return $products;
    }
}