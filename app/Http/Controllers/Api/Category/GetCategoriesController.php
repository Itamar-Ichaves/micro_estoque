<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class GetCategoriesController extends Controller
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

        $categories = $this->categoryService->getCategoriesByUuid($request->token_company);

        return response($categories);
    }

}
