<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserCreate extends FormRequest
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
        // 会员添加的表单验证
        return [
            'user_name'=>'required|regex:/\w{3,15}/|unique:user',
            'user_password'=>'required|regex:/\w{6,16}/',
            'user_repassword'=>'same:user_password|required',
            'user_phone'=>'required|unique:user|regex:/^(1)\d{10}$/',




        ];
    }




    public function messages ()
    {
        return [
            'user_name.required'=>'用户名称不能为空',
            'user_name.unique'=>'名称已被使用',
            'user_name.regex'=>'用户名由3到15位任意数字字母下划线组成',
            'user_phone.regex'=>'输入号码不合规范',
            'user_phone.required'=>'手机号不能为空',
            'user_phone.unique'=>'手机号已经被注册',
            'user_password.required'=>'密码不能为空',
            'user_password.regex'=>'密码必须是6到16位任意数字字母下划线组成',
            'user_repassword.same'=>'密码不一致',
            'user_repassword.required'=>'确认密码不能为空'

        ];
    }
}
