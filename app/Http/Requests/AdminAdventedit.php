<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAdventedit extends FormRequest
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
            'url'=>"required|url",
            'descr'=>'required',

        ];
    }

      public function messages()
    {
        return [
        'url.required'=>'网址不能为空',
        'descr.required'=>'描述不能为空',
        'url.url'=>'网址不合法输入,请重新输入',
        ];
    }


}
