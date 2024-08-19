<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductsController extends Controller
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
        $productUuid = $request->input('uuid');
        $tokenCompany = $request->input('token_company'); // Obtém o token_company do request

        $this->productService->deleteProduct($productUuid, $tokenCompany);

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], Response::HTTP_OK);
    }
}
