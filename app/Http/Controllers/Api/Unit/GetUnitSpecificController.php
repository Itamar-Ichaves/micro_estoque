<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\UnitResource;
use App\Services\UnitService;
use Illuminate\Http\Request;

class GetUnitSpecificController extends Controller
{
    protected $UnitsService;

    function __construct(UnitService $UnitsService)
    {
        $this->UnitsService = $categoryService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $identify)
    {
        if (!$category = $this->categoryService->getUnitByUuid($identify)) {
            return response()->json(['message' => 'Unit Not Found'], 404);
        }

       return response()->json($category);

    }
}
