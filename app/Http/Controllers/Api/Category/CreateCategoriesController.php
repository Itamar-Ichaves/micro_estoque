<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateCategoriesController extends Controller
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
             
        $category = $this->categoryService->createCategoryByTenant($request->all());

         
        return response()->json([
            'success' => true,
            'message' => 'Categoria Criada com Sucesso',
            'data' => new CategoryResource($category)
        ], Response::HTTP_CREATED);
    }
}
