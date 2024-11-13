<?php

namespace App\Services;

use App\Repositories\RepositoriesCategory;
use App\Repositories\StoreUpdateCategoryRepository;
use App\Services\MicroTenantsServices;

class CategoryService
{
    protected $categoryRepository, $storeUpdateCategorytRepository, $microTenantService;

    public function __construct(
        RepositoriesCategory $categoryRepository,
        MicroTenantsServices $microTenantService,
        //StoreUpdateCategoryRepository $storeUpadteCategorytRepository

    ) {
        $this->categoryRepository = $categoryRepository;
        $this->microTenantService = $microTenantService;
        //$this->storeUpdateCategorytRepository = $storeUpadteCategorytRepository;
    }

    public function getCategoriesByTenant(string $uuid)
    {
        //$tenant = $this->microTenantService->getTokenCompany($uuid);

        return $this->categoryRepository->getCategoriesByTenantId($uuid);
        

    }

    public function getCategoryByUuid($category, $tokenCompany)
    {
        return $this->categoryRepository->getCategoryByUuid($category, $tokenCompany);
    }

    function createCategoryByTenant($category)
    {
        return $this->categoryRepository->createCategory($category);

    
    }

    function updateCategoryByTenant( $category, $category_id)
    {
      
       return $this->categoryRepository->updateCategoryByTenant($category, $category_id);

        

       // dd($category,  $identify);;
    }

    public function deleteCategory($categoryUuid, $tokenCompany)
    {
         return $this->categoryRepository->deleteCategory($categoryUuid, $tokenCompany);
       
    }

}
