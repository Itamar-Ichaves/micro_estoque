<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Services\UnitService;
use Illuminate\Http\Request;

class GetUnitController extends Controller
{
    protected $unitService;

    function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $units = $this->unitService->getUnitsByTenant($request->token_company);

        return UnitResource::collection($units);
    }

}
