<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class UpdateCategoriesController extends Controller
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
        $product = $this->categoryService->updateCategoryByTenant($request->all());

           // dd($request->all(),$request->uuid);

           return Response()->json($product); 
  
    }
}
