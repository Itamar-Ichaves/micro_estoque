<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class DeleteProductsController extends Controller
{
    protected $repository;

    public function __construct(ProductService $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->repository->deleteProduct($request->all());
    }
}
