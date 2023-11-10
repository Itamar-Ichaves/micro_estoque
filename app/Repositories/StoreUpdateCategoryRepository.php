<?php

namespace App\Repositories;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

class StoreUpdateCategoryRepository
{

    protected $entity, $categoryService;

    public function __construct(
        Category $categories,
        CategoryService $categoryService)
    {
        $this->entity = $categories;
        $this->categoryService = $categoryService;
    }

    public function createCategory($category)
    {
        //dd($categories);

        $data = [

            'name' => $category['name'],
            'token_company' => $category['token_company'],
            'description'=> $category['description']
        ];

        $category = $this->entity->create($data);

        return $category;
    }

    function updateCategoryByTenant($identify, $products)
    {

        $this->entity->update($products);

        return $products;
    }

    public function deleteCategoryByUuid(string $url)
    {
        $this->entity->delete($url);
    }

}
