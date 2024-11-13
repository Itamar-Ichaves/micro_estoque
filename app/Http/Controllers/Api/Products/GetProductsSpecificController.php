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
        $token_company = $request->input('token_company');
        $token_loja = $request->input('token_loja');
        
        $product = $this->productService->getProductByUuid($token_company, $token_loja, $request->input('id'));

        return new ProductResource($product);
    }
}
