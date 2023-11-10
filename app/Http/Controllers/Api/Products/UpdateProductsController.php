<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

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
        $product = $this->productService->updateProductsByTenant($request->all());

           // dd($request->all(),$request->uuid);

           return Response()->json($product); 
    }
}
