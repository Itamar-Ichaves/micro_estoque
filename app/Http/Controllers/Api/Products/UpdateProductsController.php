<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductsController extends Controller
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
        $id = $request->input('id');
        // Atualiza o produto com base nos dados fornecidos
        $product = $this->productService->updateProductsByTenant($token_company, $token_loja, $id);

        // Retorna a resposta JSON com o status de sucesso
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], Response::HTTP_OK);
    }
}
