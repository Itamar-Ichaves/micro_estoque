<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class GetProductsSpecificController extends Controller
{

    protected $productService;

    function __construct(ProductService $categoryService)
    {
        $this->productService = $categoryService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       // dd($request);
       
       $products = $this->productService->getProductByUuid($request->all());

       return response()->json([$products ], http_response_code(200));
    
    }
}
