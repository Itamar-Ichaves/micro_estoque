<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class GetCategoryController extends Controller
{
    protected $categoryService;

    function __construct(Category $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request  $request)
    {
        return ('chegou');
    }
}
