<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class RepositoriesCategory
{
    protected $table;
    protected $entity;

    public function __construct( 
        Category $categories,
    )
    {
        $this->table = 'categories';
        $this->entity = $categories;
    }

    public function getCategoriesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('categories.*')
            ->get();
    }

    public function getCategoriesByTenantId(string $idTenant)
    {
        return DB::table($this->table)
                    ->where('token_company', $idTenant)
                    ->paginate();

        //dd($idTenant);
    }
     
    

    public function getCategoryByUuid( $category)
    {
        return$data = DB::table($this->table)
                    ->where('token_company', $category['token_company'])
                    ->where('uuid', $category['uuid'])
                    ->first();
    }

    public function createCategory($category)
    {
        $data = [

            'name' => $category['name'],
            'token_company' => $category['token_company'],
            'description'=> $category['description']
        ];

        $category = $this->entity->create($data);

        //dd($category);
        //dd($data);
        return $category;
    }

    function updateCategoryByTenant(array $category)
    {

        return DB::table($this->table)
        ->where('token_company', $category['token_company'])
        ->where('uuid', $category['uuid'])
        ->update($category);


        // dd($tenant, $category, $uuid);
    }

    public function deleteCategory($category)
    {
        return DB::table($this->table)
        ->where('token_company', $category['token_company'])
        ->where('uuid', $category['uuid'])
        ->delete();
        //dd($tenant, $uuid);
    }
}
