<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class GetProductsByCategoryController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dd($request);
       return $this->productService->getProductsByCategoryUuid($request->token_company, $request->category);
       // dd($request);
    }
}
