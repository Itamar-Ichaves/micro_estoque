<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository
{
    protected $table;
    protected $repository;
    protected $repositoryCategory;

    public function __construct(
        Product $repository,
        RepositoriesCategory $repositoryCategory
    )
    {
        $this->table = 'products';
        $this->repository = $repository;
        $this->repositoryCategory = $repositoryCategory;
    }

    public function getProductsByTenantAndCategory(string $tenant, string $categoryUuid)
    {
        return DB::table($this->table)
            ->where('token_company', $tenant)
            ->where('category_uuid', $categoryUuid)
            ->paginate();
    }

    public function getAllProductsByTenant(string $token_company)
    {
        return DB::table($this->table)
            ->where('token_company', $token_company)
            ->paginate();
    }

    public function getProductByUuid($productUuid, $tokenCompany)
    {
        return DB::table($this->table)
            ->where('token_company', $tokenCompany)
            ->where('id', $productUuid)  
            ->first();
    }

    public function getProductsByCategory(array $data)
    {
        return DB::table($this->table)
            ->where('token_company', $data["token_company"])
            ->where('category_uuid', $data["category_uuid"])
            ->paginate();
    }

    public function updateProductByTenant(array $product)
    {
        return DB::table($this->table)
            ->where('token_company', $product['token_company'])
            ->where('id', $product['uuid'])
            ->update($product);
    }

    public function deleteProduct($productUuid, $tokenCompany)
    {
        return DB::table($this->table)
            ->where('token_company', $tokenCompany)
            ->where('id', $productUuid)  
            ->delete();
    }

    public function createProduct(array $product)
    {
        //$id = (string) str::uuid();
        $data = [
            'id' => (string) Str::uuid(),
            'token_company' => $product['token_company'],
            'emitente' => $product['emitente_id'],
            'category_uuid' => $product['category_uuid'],
            'unit_uuid' => $product['unit_uuid'],

            'nome' => $product['nome'],
            'gtin' => $product['gtin'],
            'codigo_barra' => $product['codigo_barra'],
            'sku' => $product['sku'],
            'gtin_trib' => $product['gtin_trib'],
            'imagem' => $product['imagem'],
            'origem' => $product['origem'],
            'usa_grade' => $product['usa_grade'],
            //'status_uuid' => $product['status_uuid'],
            //'tipo_produto_uuid' => $product['tipo_produto_uuid'],
            //'localizacao_uuid' => $product['localizacao_uuid'],
            'unidade_pdv' => $product['unidade_pdv'],
            'referencia' => $product['referencia'],
            'qtde_venda' => $product['qtde_venda'],
            'fragmentacao_qtde' => $product['fragmentacao_qtde'],
            'fragmentacao_unidade' => $product['fragmentacao_unidade'],
            'fragmentacao_valor' => $product['fragmentacao_valor'],
            'valor_venda_atacado' => $product['valor_venda_atacado'],
            'valor_atacado_apartir' => $product['valor_atacado_apartir'],
            'comissao' => $product['comissao'],
            'valor_maior' => $product['valor_maior'],
            'valor_venda' => $product['valor_venda'],
            'valor_custo' => $product['valor_custo'],
            'margem_lucro' => $product['margem_lucro'],
            'custo_medio' => $product['custo_medio'],
            'validade' => $product['validade'],
            'ultima_compra' => $product['ultima_compra'],
            'estoque_minimo' => $product['estoque_minimo'],
            'estoque_maximo' => $product['estoque_maximo'],
            'estoque_inicial' => $product['estoque_inicial'],
            'estoque_atual' => $product['estoque_atual'],
            'cfop' => $product['cfop'],
            'ncm' => $product['ncm'],
            'cest' => $product['cest'],
            'cbenef' => $product['cbenef'],
            'indescala' => $product['indescala'],
            'cnpjfabricante' => $product['cnpjfabricante'],
            'pDif' => $product['pDif'],
            'pMVAST' => $product['pMVAST'],
            'pRedBC' => $product['pRedBC'],
            'pRedBCST' => $product['pRedBCST'],
            'pICMS' => $product['pICMS'],
            'pPIS' => $product['pPIS'],
            'pCOFINS' => $product['pCOFINS'],
            'pIPI' => $product['pIPI'],
            'aliquotapis' => $product['aliquotapis'],
            'aliquotacofins' => $product['aliquotacofins'],
            'aliquotaipi' => $product['aliquotaipi'],
            'tributado_icms' => $product['tributado_icms'],
            'tributado_ipi' => $product['tributado_ipi'],
            'tributado_pis' => $product['tributado_pis'],
            'tributado_cofins' => $product['tributado_cofins'],
            'unidade_tributavel' => $product['unidade_tributavel'],
            'quantidade_tributavel' => $product['quantidade_tributavel'],
            'produto_loja' => $product['produto_loja'],
            'produto_delivery' => $product['produto_delivery'],
            'controlar_estoque' => $product['controlar_estoque'],
            'descricao' => $product['descricao'],
            'destaque' => $product['destaque'],
            'cep' => $product['cep'],
            'num_volume' => $product['num_volume'],
            'largura' => $product['largura'],
            'comprimento' => $product['comprimento'],
            'altura' => $product['altura'],
            'peso_liquido' => $product['peso_liquido'],
            'peso_bruto' => $product['peso_bruto'],
        ];

       
            $productNew = $this->repository->create($data);

            return $productNew;
    }
}
