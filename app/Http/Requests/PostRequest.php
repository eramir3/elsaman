<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules =  [
            'category_id'=>['required'],
            'image'=>['file', 'mimes:png'],
            'video'=>['string'],
            'title_en'=>['string', 'required', 'max:255', 'unique:posts'],
            'title_fr'=>['string', 'required', 'max:255', 'unique:posts'],
            'title_es'=>['string', 'required', 'max:255', 'unique:posts'],
            'text_en'=>['string', 'required'],
            'text_fr'=>['string', 'required'],
            'text_es'=>['string', 'required'],
        ];

        if (request("_method") == "PUT")
        {
            $rules['title_en'] = ['required', 'string', 'max:255', 'unique:posts,title_en,'.$this->id];
            $rules['title_fr'] = ['required', 'string', 'max:255', 'unique:posts,title_fr,'.$this->id];
            $rules['title_es'] = ['required', 'string', 'max:255', 'unique:posts,title_es,'.$this->id];
        }

        return $rules;
    }
}
