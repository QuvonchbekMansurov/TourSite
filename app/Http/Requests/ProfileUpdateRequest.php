<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_ru' => 'required|string|min:2',
            'name_uz' => 'required|string|min:2',
            'name_en' => 'required|string|min:2',
            'teaser_ru' => 'required|string|min:10',
            'teaser_uz' => 'required|string|min:10',
            'teaser_en' => 'required|string|min:10',
            'description_ru' => 'required|string|min:10',
            'description_uz' => 'required|string|min:10',
            'description_en' => 'required|string|min:10',
            'price' => 'required|numeric|min:1|max:99999999999999.99',
            'country_id' => 'required|exists:countries,id',
            'sale' => 'nullable|numeric',
            'month' => 'nullable|numeric',
            'is_active' => 'nullable|integer|in:0,1',
            'is_popular' => 'nullable|integer|in:0,1',
            'images_token' => 'required|array',
            'images_token.*' => 'required|string',
            'category' => 'required|array',
            'category.*' => 'required|integer|exists:categories,id'
        ];
    }
}
