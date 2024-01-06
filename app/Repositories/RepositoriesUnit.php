<?php

namespace App\Repositories;

use App\Models\Unit;
use Illuminate\Support\Facades\DB;

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

    public function getUnitsByTenantId(string $idTenant)
    {
        return DB::table($this->table)
                    ->where('token_company', $idTenant)
                    ->paginate();

        //dd($idTenant);
    }
     
    

    public function getUnitByUuid( $unit)
    {
        //dd($unit['unit']);
        return$data = DB::table($this->table)
        ->where('token_company', $unit['token_company'])
                    ->where('uuid', $unit['unit'])
                    ->first();
    }

    public function createUnit($unit)
    {
       
        $data = [

            'nome' => $unit['nome'],
            'token_company' => $unit['token_company'],
            'description'=> $unit['description']
        ];

        $unit = $this->entity->create($data);

        //dd($unit);
        //dd($data);
        return $unit;
    }

    function updateUnitByTenant($unit)
    {

        $data_updated = DB::table($this->table)
        ->where('token_company', $unit['token_company'])
        ->where('uuid', $unit['uuid'])
        ->update($unit);

        return $data_updated;
        // dd($tenant, $unit, $uuid);
    }

    public function deleteUnit($unit)
    {
        return DB::table($this->table)
        ->where('token_company', $unit['token_company'])
        ->where('uuid', $unit['uuid'])
        ->delete();
        //dd($tenant, $uuid);
    }
}
