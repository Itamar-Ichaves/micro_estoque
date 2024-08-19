<?php

namespace App\Repositories;

use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 

class RepositoriesUnit
{
    protected $table;
    protected $entity;

    public function __construct( 
        Unit $units,
    )
    {
        $this->table = 'units';
        $this->entity = $units;
    }

    public function getUnitsByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('tenants', 'tenants.id', '=', 'units.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('units.*')
            ->get();
    }

    public function getUnitsByTenant(string $idTenant)
    {
        return DB::table($this->table)
                    ->where('token_company', $idTenant)
                    ->paginate();

      
    }
     
    

    public function getUnitByUuid( $data)
    {
        //dd($unit['unit']);
        return$data = DB::table($this->table)
        ->where('token_company', $data["token_company"])
                    ->where('uuid', $data['unit_uuid'])
                    ->first();
    }

    public function createUnit($unit)
    {
   
        $data = [
            'nome' => $unit['nome'],
            'token_company' => $unit['token_company'],
            'description'=> $unit['description'],
            'sigla' => $unit['sigla']
        ];
         
        $unities = $this->entity->create($data);

        return $unities;
        
    }

    function updateUnitByTenant($unit)
    {

        $data_updated = DB::table($this->table)
        ->where('token_company', $unit['token_company'])
        ->where('uuid', $unit['uuid'])
        ->update($unit);

        return $data_updated;
    }

    public function deleteUnit($uuid, $token_company)
    {
        return DB::table($this->table)
        ->where('token_company', $token_company)
        ->where('uuid', $uuid)
        ->delete();
    }
}
