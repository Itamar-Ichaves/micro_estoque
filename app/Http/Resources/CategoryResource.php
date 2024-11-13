<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'token_company' => $this->token_company, 
           // 'emitente' => $this->emitente,  
            'nome' => $this->nome, 
            'description' => $this->description 
        ];  
    }
}
