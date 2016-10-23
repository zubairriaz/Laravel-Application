<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     *
     */
    public function messages()
    {
        return ['email.email'=>'Correct email address must be entered',
                  'email.required'=>'Email address is required',

        ];
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'email|required',
            'password'=>'required',
            'status'=>'required',
            'role'=>'required'
        ];
    }

}
