<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Services\UnitService;
use Illuminate\Http\Request;

class UpdateUnitController extends Controller
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
        $product = $this->unitService->updateUnitByTenant($request->all());

           // dd($request->all(),$request->uuid);

           return Response()->json($product); 
  
    }
}
