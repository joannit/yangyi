<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class Updatepho extends FormRequest
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
    // 后台个人信息修改手机号验证
    public function rules()
    {
        return [
            'admin_phone'=>'required|unique:admin|regex:/^(1)\d{10}$/',
        ];
    }

     // 错误信息抛出
    public function messages ()
    {
        return [

            'admin_phone.regex'=>'输入号码不合规范',
            'admin_phone.required'=>'手机号不能为空',
            'admin_phone.unique'=>'修改失败！！！手机号未做改变或者手机号已经被注册',


        ];
    }
}
