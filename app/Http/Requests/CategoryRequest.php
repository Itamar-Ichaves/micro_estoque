<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = $this->all(); // Obtém todos os dados da requisição
        $categoryId = $data['category_id'] ?? null; // 

        return [
            'category_id' => [
                'required',
                'uuid', // Valida que o category_id é um UUID
                Rule::exists('categories', 'id')->where(function ($query) use ($categoryId) {
                    $query->where('id', $categoryId);
                })
            ],
            'nome' => [
                'required',
                'min:3',
                'max:50'
                
            ],
            'description' => ['required', 'min:3', 'max:100'],
        ];
    }
}
