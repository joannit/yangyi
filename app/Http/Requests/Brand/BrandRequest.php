<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            // 品牌名唯一
        'name'=>'required|unique:brand',
        ];
    }

    public function messages ()
    {
        return [

            'name.required'=>'品牌名不能为空',
            'name.unique'=>'品牌名已存在',
            ];
    }
}
