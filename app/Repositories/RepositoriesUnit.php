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
     
    

    public function getUnitByUuid( $unit, $token_company)
    {
      
        return$data = DB::table($this->table)
        ->where('token_company', $token_company)
                    ->where('id', $unit)
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

    function updateUnitByTenant($data, $uuid, $token_company)
    {
        // Atualiza a unidade
        DB::table('units')
            ->where('id', $uuid)
            ->update([
                'nome' => $data['nome'],
                'description' => $data['description'],
                'sigla' => $data['sigla'],
                'updated_at' => now(),
            ]);
    
        // Retorna os dados atualizados
        return DB::table('units')
            ->where('id', $uuid)
            ->first();
    }
    public function deleteUnit($uuid, $token_company)
    {
        return DB::table($this->table)
        ->where('token_company', $token_company)
        ->where('id', $uuid)
        ->delete();
    }
}
