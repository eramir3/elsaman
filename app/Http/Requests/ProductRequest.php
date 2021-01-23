<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>['required', 'string', 'max:255', 'unique:products'],
            'code'=>['required', 'string', 'max:255', 'unique:products'],
            'quantity' =>['required', 'integer', 'min:0'],
            'description'=>['required', 'string'],
            'size'=>['required', 'string', 'max:255'],
            'price'=>['required', 'numeric', 'min:0'],
            'discount_price'=>['numeric', 'min:0'],
            'category_id'=>['required'],
            'main_image' => ['sometimes', 'file', 'required', 'mimes:png'],
            'images.*'=> ['sometimes', 'file', 'mimes:png'],
            'status' => ['string'],
        ];        

        if (request("_method") == "PUT")
        {
            $rules['name'] = ['required', 'string', 'max:255', 'unique:products,name,'.$this->id];
            $rules['code'] = ['required', 'string', 'max:255', 'unique:products,code,'.$this->id];
        }

        return $rules;
    }
}
