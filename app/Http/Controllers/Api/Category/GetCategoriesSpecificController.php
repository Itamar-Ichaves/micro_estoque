<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetCategoriesSpecificController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categoryUuid = $request->input('uuid');
        $tokenCompany = $request->input('token_company');
        $category = $this->categoryService->getCategoryByUuid($categoryUuid, $tokenCompany);

        
        return new CategoryResource($category);
    }
}
