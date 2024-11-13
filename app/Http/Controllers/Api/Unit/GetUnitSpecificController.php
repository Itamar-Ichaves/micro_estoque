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
        $this->UnitsService = $UnitsService;
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
 
        $uuid = $request->input('unit_id');
        $token_company = $request->input('token_company');
         
        $unit = $this->UnitsService->getUnitByUuid($uuid, $token_company);
        

       return New UnitResource($unit);

    }
}
