<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RepositoriesCategory
{
    protected $model;
    protected $table;

    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->table = 'categories';
    }

    public function getCategoriesByTenantUuid(string $uuid)
    {
        return $this->model
            ->where('token_company', $uuid) // Assumindo que 'token_company' é usado para o filtro de tenant
            ->get();
    }

    public function getCategoriesByTenantId(string $idTenant)
    {
        return $this->model
            ->where('token_company', $idTenant)
            ->paginate();
    }

    public function getCategoryByUuid(string $uuid)
    {
        return $this->model
            ->where('id', $uuid) // Use 'id' em vez de 'uuid'
            ->first();
    }

    public function createCategory(array $category)
    {
        $data = [
           
            'token_company' => $category['token_company'],
            'description' => $category['description'],
            'nome' => $category['nome'],
        ];
    
        $categories = $this->model->create($data);

        return $categories;
       
    }
    
    public function updateCategoryByTenant(array $data, $category_id)
    {
      
          DB::table('categories')
      // ->where('token_company', $data['token_company'])
        ->where('id', $category_id)
        ->update([
            'nome' => $data['nome'],
            'description' => $data['description'],
            'updated_at' => now(), // Opcional, se quiser atualizar a coluna 'updated_at'
        ]);
        return DB::table('categories')
            ->where('id', $category_id)
            ->first();
           
    }

    public function deleteCategory(string $categoryUuid, string $tokenCompany)
    {
        return $this->model
            ->where('token_company', $tokenCompany)
            ->where('id', $categoryUuid)
            ->delete();
    }
}
