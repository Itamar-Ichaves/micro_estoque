<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Http\Resources\ProductResource;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        
        $unit = $this->unitService->createUnitByTenant($request->all());
       // dd($unit);
        return response()->json([
            'success' => true,
            'message' => 'Categoria Criada com Sucesso',
            'data' => new UnitResource($unit)
        ], Response::HTTP_CREATED);
    }

}
