<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Http\Resources\ProductResource;
use App\Services\UnitService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateUnitController extends Controller
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
        
        $Product = $this->unitService->createUnitByTenant($request->all());

        broadcast(new UnitResource($Product));

        return Response()->json($Product);
    }

}
