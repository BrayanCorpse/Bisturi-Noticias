<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        return [
            'title'       => 'required|unique:articles',
            'category_id' => 'required',
            'content'     => 'min:60|required',
            'excerpt'     => 'max:600',
            'tags'        => 'required',
            'image'       => 'required'
        ];
    }
}
