<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminGoodsinsert extends FormRequest
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
            'name'=>'required',
            'price'=>'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
            'typeid'=>'required',
            'store'=>'regex:/^\d{1,8}$/',
            'pic'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'name.required'=>'商品名不能为空',
        'price.required'=>'价格不能为空',
        'price.regex'=>'价格输入有误,最多保留两位小数点',
        'typeid.required'=>'请选择商品分类',
        'store.regex'=>'请输入正确的库存',
        'pic.required'=>'请上传图片',
        ];
    }

}
