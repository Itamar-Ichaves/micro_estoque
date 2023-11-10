<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class GetCategoriesSpecificController extends Controller
{
    protected $categoryService;

    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       $category = $this->categoryService->getCategoryByUuid($request->all());
   
       return response()->json($category);

    }
}
