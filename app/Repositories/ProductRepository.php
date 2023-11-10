<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class ProductRepository
{
    protected $table;
    protected $repositoryCategory;

    public function __construct(
        RepositoriesCategory $repositoryCategory
    )
    {
        $this->table = 'products';
        $this->repositoryCategory = $repositoryCategory;
    }

    public function getproductsByTenantId(string $tenant, string $uuid)
    {
        return DB::table($this->table)
                    ->where('token_company', $tenant)
                    ->where('category_uuid', $uuid)
                    ->first();
    }

    public function getProductsALL(string $uuid)
    {
        return DB::table($this->table)
                    ->where('token_company', $uuid)
                    ->paginate();
    }

    public function getProductByUuid($products)
    {

    return  DB::table($this->table)
                    ->where('token_company', $products['token_company'])
                    ->where('uuid', $products['uuid'])
                    ->first();


    
    }


    public function getProductsByCategories(string $idTenant, string $categories)
    {
        return DB::table($this->table)
                    ->join('category_product', 'category_product.product_id', '=', 'products.id')
                    ->join('categories', 'category_product.category_id', '=', 'categories.id')
                    ->where('products.token_company', $idTenant)
                    ->where('categories.token_company', $idTenant)
                    ->where(function ($query) use ($categories) {
                        if ($categories != [])
                            $query->whereIn('categories.uuid', $categories);
                    })
                    ->select('products.*')
                    ->get();
    }

    public function getproductsBycategory(string $tenant, string $uuid)
    {
        //$tenant = $this->microTenantsServices->getTokenCompany($uuid);

       $category = $this->repositoryCategory->getCategoryByUuid($uuid);

      //return $this->productRepository->getproductsByTenantId($tenant, $uuid);

      dd($category);
    
    }

    function updateProductByTenant($product)
    {

        return DB::table($this->table)
        ->where('token_company', $product['token_company'])
        ->where('uuid', $product['uuid'])
        ->update($product);


        // dd($product, $uuid);
    }

    public function deleteProduct($product)
    {
        return DB::table($this->table)
        ->where('token_company', $product['token_company'])
        ->where('uuid', $product['uuid'])
        ->delete();
        //dd($tenant, $uuid);
    }
}