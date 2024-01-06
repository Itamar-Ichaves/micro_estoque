<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

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
    public function __invoke(TenantFormRequest $request)
    {
       //dd($request);
        $Product = $this->productService->createProductsByTenant($request);

        //$Product = $this->productService->createProductsByTenant($request->token_company, $request->category_uuid, $request->unit_uuid, $request->all());

        broadcast(new ProductResource($Product));

        return Response($Product);
    }
}
