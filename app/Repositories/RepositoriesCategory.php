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
    
    public function updateCategoryByTenant(array $data)
    {
        return $this->model
            ->where('token_company', $data['token_company'])
            ->where('id', $data['id'])
            ->update($data);
    }

    public function deleteCategory(string $categoryUuid, string $tokenCompany)
    {
        return $this->model
            ->where('token_company', $tokenCompany)
            ->where('id', $categoryUuid)
            ->delete();
    }
}
