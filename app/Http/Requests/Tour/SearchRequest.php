<?php

namespace App\Http\Requests\Tour;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country_id'=>'nullable|exists:countries,id',
            'category_id'=>'nullable|exists:categories,id',
            'name'=>'nullable|string'
        ];
    }
    
    public function bodyParameters():array
    {
        return [
            'country_id' => [
                'description' => 'Country ni id si',
                'example' => '1',
            ],
            'name' => [
                'description' => 'name bo`yicha search' ,
                'example' => 'nimadir',
            ]
        ];
    }
}
