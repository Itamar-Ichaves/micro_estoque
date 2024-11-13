<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\RepositoriesCategory;
use App\Repositories\RepositoriesUnit;
use App\Repositories\StoreUpdteProductRepository;
use App\Services\MicroTenantsServices;

class ProductService
{
    protected $repositoriesUnit;
    protected $repositoriesCategory;
    protected $productRepository;
    protected $storeUpdateProductRepository;
    protected $microTenantsServices;

    public function __construct(
        ProductRepository $productRepository,
        StoreUpdteProductRepository $storeUpdateProductRepository,
        MicroTenantsServices $microTenantsServices,
        RepositoriesCategory $repositoriesCategory,
        RepositoriesUnit $repositoriesUnit
    ) {
        $this->productRepository = $productRepository;
        $this->storeUpdateProductRepository = $storeUpdateProductRepository;
        $this->microTenantsServices = $microTenantsServices;
        $this->repositoriesCategory = $repositoriesCategory;
        $this->repositoriesUnit = $repositoriesUnit;
    }

    public function getProductsByTenantUuid($token_company, $token_loja)
    {
        return $this->productRepository->getAllProductsByTenant($token_company, $token_loja);
    }

    public function getProductsByCategory($data)
    {
        // Obtém a categoria pelo UUID
        $category = $this->repositoriesCategory->getCategoryByUuid($data);
    
        // Verifica se a categoria existe
        if (!$category) {
            // Retorna uma resposta adequada se a categoria não for encontrada
            return [
                'success' => false,
                'message' => 'Category not found'
            ];
        }
    
        // Obtém produtos associados à categoria
        $products = $this->productRepository->getProductsByCategory($data);
    
        // Retorna os produtos encontrados
        return [
            'success' => true,
            'data' => $products
        ];
    }
    

    public function getProductByUuid($token_company, $token_loja, $productUuid)
    {
        return $this->productRepository->getProductByUuid($token_company, $token_loja, $productUuid);
    }

    public function createProductsByTenant($token_company, $token_loja, array $productData)
    {
 
        return $this->productRepository->createProduct($token_company, $token_loja,$productData);
    }

    public function updateProductsByTenant($token_company, $token_loja,array $productData)
    {
        return $this->productRepository->updateProductByTenant($token_company, $token_loja, $productData);
    }

    public function deleteProduct($token_company, $token_loja, $productUuid)
    {
        return $this->productRepository->deleteProduct($token_company, $token_loja, $productUuid);
    }
}
