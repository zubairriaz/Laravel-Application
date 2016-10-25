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
     *
     */
    public function messages()
    {
        return [
            'category_id.required'=>'Category field is required',
            'file.required'=>'Picture is required'

        ];

    }

    public function rules()
    {
        return [
            'title'=>'required',
            'body'=>'required',
            'file'=>'required',
            'category_id'=>'required'

        ];
    }
}
