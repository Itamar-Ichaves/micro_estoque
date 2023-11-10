<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Services\CategoryService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateCategoriesController extends Controller
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
        $Product = $this->categoryService->createCategoryByTenant($request->all());

        broadcast(new CategoryResource($Product));

        return Response()->json($Product);
    }

}
