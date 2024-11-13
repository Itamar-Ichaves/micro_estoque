<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(ProductRequest $request)
    {
        $token_company = $request->input('token_company');
        $token_loja = $request->input('token_loja');
        
        $product = $this->productService->createProductsByTenant($token_company, $token_loja, $request->all());

  
        return response()->json([
            'success' => true,
            'data' => new ProductResource($product),
            'message' => 'Product created successfully'
        ], Response::HTTP_CREATED);
    }
}
