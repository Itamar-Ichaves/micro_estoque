<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $token_company = $request->input('token_company');
        $token_loja = $request->input('token_loja');

        // Obtém os produtos pelo token da empresa
        $products = $this->productService->getProductsByTenantUuid($token_company, $token_loja);

        // Retorna uma coleção de recursos de produto
        return ProductResource::collection($products);
    }
}
