<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\UnitResource;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $uuid = $request->input('unit_id');
        $token_company = $request->input('token_company');
        $unitUpdate = $this->unitService->updateUnitByTenant($request->all(), $uuid, $token_company);

            
           return response()->json([
            'success' => true,
            'message' => 'Unidade alterada com sucesso',
            'data' => new UnitResource( $unitUpdate)
        ], Response::HTTP_OK);
  
    }
}
