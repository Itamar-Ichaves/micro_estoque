<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository
{
    protected $table;
    protected $repository;
    protected $repositoryCategory;

    public function __construct(
        Product $repository,
        RepositoriesCategory $repositoryCategory
    )
    {
        $this->table = 'products';
        $this->repository = $repository;
        $this->repositoryCategory = $repositoryCategory;
    }

    public function getProductsByTenantAndCategory($token_company, $token_loja)
    {
        return DB::table($this->table)
            ->where('token_company', $token_company)
            ->where('token_loja', $token_loja)
            //->where('category_uuid', $categoryUuid)
            ->paginate();
    }

    public function getAllProductsByTenant($token_company, $token_loja)
    {
        return DB::table($this->table)
            ->where('token_company', $token_company)
            ->where('token_loja', $token_loja)
            ->paginate();
    }

    public function getProductByUuid($token_company, $token_loja, $productUuid)
    {
        return DB::table($this->table)
            ->where('token_company', $token_company)
            ->where('token_loja', $token_loja)
            ->where('id', $productUuid)  
            ->first();
    }

    public function getProductsByCategory(array $data)
    {
        return DB::table($this->table)
            ->where('token_company', $data["token_company"])
            ->where('category_uuid', $data["category_uuid"])
            ->paginate();
    }

    public function updateProductByTenant($token_company, $token_loja, array $product)
    {
        return DB::table($this->table)
            ->where('token_company', $token_company)
            ->where('token_loja', $token_loja)
            ->where('id', $product['id'])
            ->update($product);
    }

    public function deleteProduct($token_company, $token_loja, $productUuid)
    {
        return DB::table($this->table)
            ->where('token_company', $token_company)
            ->where('token_loja', $token_loja)
            ->where('id', $productUuid)  
            ->delete();
    }

    public function createProduct($token_company, $token_loja, array $product)
    {
        //$id = (string) str::uuid();
        $data = [
            'id' => (string) Str::uuid(),
            'token_company' => $token_company,
            'token_loja' => $token_loja,
            //'category_uuid' => $product['category_uuid'],
            
            'cProd' => $product['cProd'],
            'xProd' => $product['xProd'],
            'NCM' => $product['NCM'],
            'uCom' => $product['uCom'],
            'qCom' => $product['qCom'],
            'vUnCom' => $product['vUnCom'],
            'vProd' => $product['vProd'],
            'CFOP' => $product['CFOP'],
            'orig' => $product['orig'],
            'cEAN' => $product['cEAN'],
            'uTrib' => $product['uTrib'],
            'cest' => $product['cest'],
            'cst' => $product['cst'],
            'aliqProd' => $product['aliqProd'],
            'vBC' => $product['vBC'],
            'vICMS' => $product['vICMS'],
            'vICMSST' => $product['vICMSST'],
            'vBCST' => $product['vBCST'],
        ];

       
            $productNew = $this->repository->create($data);

            return $productNew;
    }
}
