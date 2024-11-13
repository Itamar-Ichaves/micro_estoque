<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token_company.required' => 'O campo "Token da Empresa" é obrigatório.',
            //'token_loja.required' => 'O campo "Token da Loja" é obrigatório.',
            //'category_uuid.required' => 'O campo "Categoria UUID" é obrigatório.',
           // 'group_uuid.required' => 'O campo "Grupo UUID" é obrigatório.',
            'cProd.required' => 'O campo "Código do Produto" é obrigatório.',
            'xProd.required' => 'O campo "Descrição do Produto" é obrigatório.',
            'NCM.required' => 'O campo "Código NCM" é obrigatório.',
            'uCom.required' => 'O campo "Unidade de Medida" é obrigatório.',
            'qCom.required' => 'O campo "Quantidade Comercial" é obrigatório.',
            'vUnCom.required' => 'O campo "Valor Unitário" é obrigatório.',
            'vProd.required' => 'O campo "Valor Total" é obrigatório.',
            'CFOP.required' => 'O campo "CFOP" é obrigatório.',
            'orig.required' => 'O campo "Origem do Produto" é obrigatório.',
            'cEAN.required' => 'O campo "Código EAN" é obrigatório.',
            'uTrib.required' => 'O campo "Unidade Tributária" é obrigatório.',
            'cest.required' => 'O campo "Código CEST" é obrigatório.',
    ];
    }
}
