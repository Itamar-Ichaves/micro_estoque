<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoriesController extends Controller
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
        $categoryData = $request->all();

        $updatedCategory = $this->categoryService->updateCategoryByTenant($categoryData);

        
        return response()->json([
            'success' => true,
            'message' => 'Categoria alterada com sucesso',
            'data' => new CategoryResource( $updatedCategory)
        ], Response::HTTP_OK);
    }
}
