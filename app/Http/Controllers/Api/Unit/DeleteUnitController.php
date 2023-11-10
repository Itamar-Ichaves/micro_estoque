<?php

namespace App\Http\Controllers\Api\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Models\Unit;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
          $this->repository->deleteUnit($request->all());

    }
}
