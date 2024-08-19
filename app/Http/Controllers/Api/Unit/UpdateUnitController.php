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
        $unitUpdate = $this->unitService->updateUnitByTenant($request->all());

           // dd($request->all(),$request->uuid);
           return response()->json([
            'success' => true,
            'message' => 'Unidade alterada com sucesso',
            'data' => new UnitResource( $unitUpdate)
        ], Response::HTTP_OK);
  
    }
}
