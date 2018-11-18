<?php

namespace App\Http\Requests\Goods;

use Illuminate\Foundation\Http\FormRequest;

class Goodsinfoadd extends FormRequest
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
            'colorid'=>'required',
            'sizeid'=>'required',
            'store'=>'required|regex:/^\+?[1-9][0-9]*$/',
            'gprice'=>'required|regex:/(?!^0*(\.0{1,2})?$)^\d{1,10}(\.\d{1,2})?$/',
            'discount'=>'required|between:1,100|integer',
            'udis'=>'required|between:1,100|integer',
            'gstatus'=>'required'
        ];
    }

    // 错误抛出
    public function messages()
    {
        return [
        'colorid.required'=>'请选择商品颜色',
        'sizeid.required'=>'请选择规格',
        'store.required'=>'请填写库存',
        'store.regex'=>'库存输入格式不符合，库存必须是大于0的正整数',
        'gprice.required'=>'请填写商品价格',
        'gprice.regex'=>'价格输入不规范,最大十位数，小数点后最多两位',
        'discount.required'=>'请填写普通折扣,100为不打折',
        'discount.between'=>'vip折扣为1到100之间的整数',
        'discount.integer'=>'普通折扣为整数',
        'udis.required'=>'请填写vip折扣,100为不打折',
        'udis.between'=>'vip折扣为1到100之间的整数',
        'udis.integer'=>'vip折扣为1到100之间的整数',
        'gstatus.required'=>'请选择商品状态',

        ];

    }
}
