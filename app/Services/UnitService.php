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

    public function getUnitsByTenant($uuid)
    {
        //$tenant = $this->microTenantService->getTokenCompany($uuid);

        return $this->unitRepository->getUnitsByTenant($uuid);
       /// dd( $tenant);

    }

    public function getUnitByUuid($uuid, $token_company)
    {
        return $this->unitRepository->getUnitByUuid($uuid);
    }

    function createUnitByTenant($unit)
    {
        
        return $this->unitRepository->createUnit($unit);

    }

    function updateUnitByTenant($unit)
    {
      
       return $this->unitRepository->updateUnitByTenant($unit);

        

       // dd($unit,  $identify);;
    }

    public function deleteUnit($uuid, $token_company)
    {
         return $this->unitRepository->deleteUnit($uuid, $token_company);
       
    }

}
