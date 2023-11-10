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

    public function getCategoriesByUuid(string $uuid)
    {
        //$tenant = $this->microTenantService->getTokenCompany($uuid);

        return $this->categoryRepository->getCategoriesByTenantId($uuid);
       /// dd( $tenant);

    }

    public function getCategoryByUuid($category)
    {
        return $this->categoryRepository->getCategoryByUuid($category);
    }

    function createCategoryByTenant($category)
    {
        $this->categoryRepository->createCategory($category);

        return $category;
    }

    function updateCategoryByTenant( $category)
    {
      
       return $this->categoryRepository->updateCategoryByTenant($category);

        

       // dd($category,  $identify);;
    }

    public function deleteCategory($category)
    {
         return $this->categoryRepository->deleteCategory($category);
       
    }

}
