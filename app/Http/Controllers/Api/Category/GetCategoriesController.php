<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetCategoriesController extends Controller
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
        $tokenCompany = $request->input('token_company');

        // Obtém as categorias usando o serviço
        $categories = $this->categoryService->getCategoriesByTenant($tokenCompany);

        // Retorna a coleção de categorias como recursos
        return CategoryResource::collection($categories);
    }
}
