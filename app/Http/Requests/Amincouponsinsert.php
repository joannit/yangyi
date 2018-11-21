<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Amincouponsinsert extends FormRequest
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
            'pname'=>'required',
            'money'=>'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
            'lowmoney'=>'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
            'discount'=>'required|regex:/^\d{1,8}(\.\d{1})?$/',
            'start_time'=>'required|regex:/\d{4}-\d{2}-\d{2}/',
            'end_time'=>'required|regex:/\d{4}-\d{2}-\d{2}/',
        ];
    }
     public function messages()
    {
        return [
        'pname.required'=>'商品名不能为空',
        'money.required'=>'金额不能为空',
        'money.regex'=>'金额输入有误,最多保留两位小数点',
      	'lowmoney.required'=>'金额不能为空',
        'lowmoney.regex'=>'最低消费输入有误,最多保留两位小数点',
      	'discount.regex'=>'折扣输入有误,最多保留小数点一位',
      	'start_time.required'=>'时间不能为空',
      	'start_time.regex'=>'请输入正确的时间格式 XXXX-MM-DD',
      	'end_time.required'=>'时间不能为空',
      	'end_time.regex'=>'请输入正确的时间格式 XXXX-MM-DD',
        ];
    }
}
