<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class Updatepwd extends FormRequest
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
    // 验证密码
    public function rules()
    {
        return [
           'oldpassword'=>'required|regex:/\w{6,16}/',
           'newpassword'=>'required|regex:/\w{6,16}/',
           'newrepassword'=>'same:newpassword|required',
        ];
    }

    public function messages ()
    {
        return [

            'oldpassword.required'=>'密码不能为空',
            'oldpassword.regex'=>'密码必须是6到16位任意数字字母下划线组成',
            'newpassword.required'=>'新密码不能为空',
            'newpassword.regex'=>'新密码必须是6到16位任意数字字母下划线组成',


            'newrepassword.same'=>'新密码与确认密码不一致',
            'newrepassword.required'=>'确认密码不能为空'

        ];
    }
}
