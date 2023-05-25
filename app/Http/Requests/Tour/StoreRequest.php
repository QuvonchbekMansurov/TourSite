<?php

namespace App\Http\Requests\Tour;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ru'=>'required|string|min:2',
            'name_uz'=>'required|string|min:2',
            'name_en'=>'required|string|min:2',
            'teaser_ru'=>'required|string|min:10',
            'teaser_uz'=>'required|string|min:10',
            'teaser_en'=>'required|string|min:10',
            'description_ru'=>'required|string|min:10',
            'description_uz'=>'required|string|min:10',
            'description_en'=>'required|string|min:10',
            'price'=>'required|numeric|min:1|max:99999999999999.99',
            'country_id'=>'required|exists:countries,id',
            'sale'=>'nullable|numeric',
            'month'=>'nullable|numeric',
            'is_active'=>'nullable|integer|in:0,1',
            'is_popular'=>'nullable|integer|in:0,1',
        ];
    }
}
