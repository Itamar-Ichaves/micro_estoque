<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        // Valida o parâmetro 'category_uuid'
        $validated = $request->validate([
            'category_uuid' => 'required|uuid'
        ]);

        // Obtém os produtos pela categoria
        $products = $this->productService->getProductsByCategory($request);

        // Retorna uma resposta bem-sucedida com os produtos
        return response()->json([
            'success' => true,
            'data' => $products
        ], Response::HTTP_OK);
    }
}
