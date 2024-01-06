<?php

namespace App\Services;


use App\Repositories\ProductRepository;
use App\Repositories\RepositoriesCategory;
use App\Repositories\RepositoriesUnit;
use App\Repositories\StoreUpdteProductRepository;
use App\Services\MicroTenantsServices;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseStatusCodeSame;

class ProductService
{
    protected $repositoriesunit, $repositoriesCategory, $productRepository, $storeUpdteProductRepository, $microTenantsServices;

    public function __construct(
        ProductRepository $productRepository,
        StoreUpdteProductRepository $storeUpdteProductRepository,
        MicroTenantsServices $microTenantsServices,
        RepositoriesCategory $repositoriesCategory,
        RepositoriesUnit $repositoriesunit

    ) {
        $this->productRepository = $productRepository;
        $this->storeUpdteProductRepository = $storeUpdteProductRepository;
        $this->microTenantsServices = $microTenantsServices;
        $this->repositoriesCategory = $repositoriesCategory;
        $this->repositoriesunit = $repositoriesunit;


    }

    public function getProductsByTenantUuid(string $uuid)
    {
      /* $tenant = $this->microTenantsServices->getTokenCompany($uuid);

       //$category = $this->categoryRepository->getCategoryByUuid($uuid);

       //dd ($tenant);
       if ($tenant == 'statusCode: 200') {
       return $this->productRepository->getProductsALL($uuid);
      
       } else {
        return response()->json(['message' => 'token Company Not Found'], 404);
       }
       //dd( $uuid);*/

       return $this->productRepository->getProductsALL($uuid);
    }

    public function getProductsByCategoryUuid($products)
    {
       // $verificToken = $this->microTenantsServices->getTokenCompany($tenant);

      /* if ($verificToken = 'statusCode: 200') {
        return $this->productRepository->getProductByUuid($tenant, $uuid_category);
       } else {
        return response()->json(['message' => 'Not Found'], 404);
       } */


       return $this->productRepository->getProductByUuid($products);

    //dd($iDtenant);
    
    }

 

    public function getProductByUuid($products)
    {
        //$verificToken = $this->microTenantsServices->getTokenCompany($tenant);

       
        //$category = $this->categoryRepository->getCategoryByUuid($uuid);
 
        /* if ($verificToken == 'statusCode: 200') {
            return $this->productRepository->getProductByUuid($tenant, $uuid);
            } else {
             return response()->json(['message' => 'Not Found'], 404);
            } */
    
            
       return $this->productRepository->getProductByUuid($products);
         
        
    }

    function createProductsByTenant($products)
    {
      
       $data_category = $this->repositoriesCategory->getCategoryByUuid($products);
       //dd( $data_category );

       if (!isset($data_category->uuid)){
        return response()->json(['message' => 'Categoria Não existe'], 404);
       } 


       $data_unit = $this->repositoriesunit->getUnitByUuid($products);
       
 
        if (!isset($data_unit->uuid)){
         return response()->json(['message' => 'Unidade nao existe'], 404);
        } 
       
       /*
       $verificToken = $this->microTenantsServices->getTokenCompany($tenant);
       //dd( $verificToken);

        if ($verificToken = 'statusCode: 200'){
        return  $this->storeUpdteProductRepository->createProducts($tenant, $products, $data_category->uuid);
       } else {
        return response()->json(['message' => 'Token Company Not Found'], 404);
       }
       */
      //dd( $data_category['uuid']);

      //dd($products);
    

      return  $this->storeUpdteProductRepository->createProducts($products);
    
    }

    function updateProductsByTenant( $product)
    {
       /* $verificToken = $this->microTenantsServices->getTokenCompany($tenant);

        if ($verificToken = 'statusCode: 200') {
       return $this->productRepository->updateProductByTenant($product, $tenant, $uuid);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }*/

        return $this->productRepository->updateProductByTenant($product);

    }

    public function deleteProduct($product)
    {  
        /*
        $verificToken = $this->microTenantsServices->getTokenCompany($tenant);

        if ($verificToken = 'statusCode: 200') {
         return $this->productRepository->deleteProduct($tenant, $uuid);
        } else {
            return response()->json(['message' => 'Not Found'], 404);
        }
        */

        return $this->productRepository->deleteProduct($product);
    }
}
