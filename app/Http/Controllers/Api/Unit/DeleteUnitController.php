<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Models\Unit;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DeleteUnitController extends Controller
{
    protected $repository;

    public function __construct(UnitService $unit)
    {
        $this->repository = $unit;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $uuid = $request->input('uuid');
        $token_company = $request->input('token_company');

        $unitDeleted =  $this->repository->deleteUnit($uuid, $token_company);

        return response()->json([
            'success' => true,
            'message' => 'Unidade de medida deletada'
        ], Response::HTTP_OK);

    }
}
