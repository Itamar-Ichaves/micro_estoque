<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller; 
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
    public function __invoke(Request $request)
    {
             
        
        $product = $this->productService->createProductsByTenant($request->all());

  
        return response()->json([
            'success' => true,
            'data' => new ProductResource($product),
            'message' => 'Product created successfully'
        ], Response::HTTP_CREATED);
    }
}
