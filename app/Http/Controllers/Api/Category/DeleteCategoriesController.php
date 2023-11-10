<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DeleteCategoriesController extends Controller
{
    protected $repository;

    public function __construct(CategoryService $category)
    {
        $this->repository = $category;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
          $this->repository->deleteCategory($request->all());

    }
}
