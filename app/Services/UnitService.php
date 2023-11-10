<?php

namespace App\Services;

use App\Repositories\RepositoriesUnit;
use App\Repositories\StoreUpdateUnitRepository;
use App\Services\MicroTenantsServices;

class UnitService
{
    protected $unitRepository, $storeUpdateUnittRepository, $microTenantService;

    public function __construct(
        RepositoriesUnit $unitRepository,
        MicroTenantsServices $microTenantService,
        //StoreUpdateUnitRepository $storeUpadteUnittRepository

    ) {
        $this->unitRepository = $unitRepository;
        $this->microTenantService = $microTenantService;
        //$this->storeUpdateUnittRepository = $storeUpadteUnittRepository;
    }

    public function getUnitsByUuid(string $uuid)
    {
        //$tenant = $this->microTenantService->getTokenCompany($uuid);

        return $this->unitRepository->getUnitsByTenantId($uuid);
       /// dd( $tenant);

    }

    public function getUnitByUuid(string $uuid)
    {
        return $this->unitRepository->getUnitByUuid($uuid);
    }

    function createUnitByTenant($unit)
    {
        
        
        $this->unitRepository->createUnit($unit);

        return $unit;
    }

    function updateUnitByTenant($unit)
    {
      
       return $this->unitRepository->updateUnitByTenant($unit);

        

       // dd($unit,  $identify);;
    }

    public function deleteUnit($unit)
    {
         return $this->unitRepository->deleteUnit($unit);
       
    }

}
