<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteCategoriesController extends Controller
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
        
        $this->categoryService->deleteCategory($categoryUuid, $tokenCompany);

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ], Response::HTTP_OK);
    }
}
