<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
        $category_id = $request->category_id;
      
        $updatedCategory = $this->categoryService->updateCategoryByTenant($categoryData, $category_id);

        
        return response()->json([
            'success' => true,
            'message' => 'Categoria Criada com Sucesso',
            'data' => new CategoryResource( $updatedCategory)
        ], Response::HTTP_CREATED);
    }
}
