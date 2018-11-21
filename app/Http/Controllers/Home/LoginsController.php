<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//引入校验类
use Gregwar\Captcha\CaptchaBuilder;
//引入注册的验证方法
use App\Http\Controllers\RegistersController;
class LoginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
     public function codes()
    { 
    	ob_clean();//清除操作
		$builder = new CaptchaBuilder;
		//可以设置图片宽高及字体
		$builder->build($width = 100, $height = 40, $font = null);
		//获取验证码的内容
		$phrase = $builder->getPhrase();
		//把内容存入session
		session(['vcode'=>$phrase]);
		//生成图片
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Home.Logins.logins");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data=$request->only(['email',''])
       // Registers::codes();
        $email=$request->input('email');
        $password=$request->input('user_password');
        //获取校验码
        $fcode=$request->input('fcode');
        //获取系统校验码
        $vcode=session('vcode');
        $data=DB::table('user')->where('email','=',$email)->where('user_status','=',1)->first();
        //dd($data);
        if($data){ 
        	if(Hash::check($password,$data->user_password)){ 
        		if($fcode==$vcode){ 
        			return redirect('/')->with('success','登录成功');
        		}else{ 
        			return back()->with('error','校验码有误');
        		}
        	}else{ 
        		return back()->with('error','密码有误');
        	}
        }else{ 
        	return back()->with('error','邮箱有误');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
