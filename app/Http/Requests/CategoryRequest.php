<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $rules = [
            'name'=>['required', 'string', 'max:255', 'unique:categories'],
            'posts_active'=>['sometimes', 'accepted'],
            'products_active'=>['sometimes', 'accepted'],
        ];

        if (request("_method") == "PUT")
        {
            $rules['name'] = ['string', 'max:255', 'unique:categories,name,'.$this->id];
        }

        return $rules;
    }
}
