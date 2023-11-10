<?php

namespace App\Services;

use Carlosfgti\MicroservicesCommon\Services\Traits\ConsumeExternalService;

class MicroTenantsServices
{
    use ConsumeExternalService;

    protected $url;
    protected $token;

    public function __construct()
    {
        $this->token = config('services.painel_adm_auth_tenant.token');
        $this->url = config('services.painel_adm_auth_tenant.url');
    }

    public function getTokenCompany(string $token_company)
    {
      $token = $this->request('get', "https://f863-189-84-69-30.ngrok-free.app/api/v1/tenants/$token_company");
       //dd($response);

     return response($token);
    }
}
