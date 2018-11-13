<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class MasterCreate extends FormRequest
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
    // 管理员添加规则
    public function rules()
    {
        return [
            'admin_name'=>'required|regex:/\w{3,10}/|unique:admin',
            'admin_password'=>'required|regex:/\w{6,16}/',
            'admin_repassword'=>'same:admin_password|required',
            'admin_phone'=>'required|unique:admin|regex:/^(1)\d{10}$/',
        ];
    }
    // 错误信息抛出
    public function messages ()
    {
        return [
            'admin_name.required'=>'用户名称不能为空',
            'admin_name.unique'=>'名称已被使用',
            'admin_name.regex'=>'名称由3到10位任意数字字母下划线组成',
            'admin_phone.regex'=>'输入号码不合规范',
            'admin_phone.required'=>'手机号不能为空',
            'admin_phone.unique'=>'手机号已经被注册',
            'admin_password.required'=>'密码不能为空',
            'admin_password.regex'=>'密码必须是6到16位任意数字字母下划线组成',
            'admin_repassword.same'=>'密码不一致',
            'admin_repassword.required'=>'确认密码不能为空'

        ];
    }
}
