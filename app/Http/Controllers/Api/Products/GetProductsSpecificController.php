<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetProductsSpecificController extends Controller
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
        $productUuid = $request->input('product_id');
        $tokenCompany = $request->input('token_company');
        
        $product = $this->productService->getProductByUuid($productUuid, $tokenCompany);

        return new ProductResource($product);
    }
}
