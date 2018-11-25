<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入验证码类
use Gregwar\Captcha\CaptchaBuilder;
use DB;
use Hash;
use Mail;

class RegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home.Registers.registers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //引入验证码
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
    //发送纯文本
    public function sendMail($email,$id,$token){ 
    	Mail::send('Home.Registers.a',['id'=>$id,'token'=>$token],function($message)use($email){ 
    		//发送主题
    		$message->subject('o2o29用户激活');
    		//接收方
    		$message->to($email);

    	});
    }
    public function jihuo(Request $request) 
	{ 
		$id=$request->input('id');
		$info=DB::table('user')->where('id','=',$id)->first();
		$token=$request->input('token');

		if($token==$info->token){ 
			$res['user_status']=1;
			$res['token']=str_random(50);
			DB::table('user')->where('id','=',$id)->update($res);
			echo "用户已经激活,请去登录";
		}

	}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//echo 21;exit;
        //获取输入校验码

        $fcode=$request->input("fcode");
       // echo $fcode;
        //获取系统验证码
        $vcode=session("vcode");
       // echo $vcode;
        $data=$request->only(['email','user_password']);
        $data['user_name']='军哥';
        // status 状态值为0 表示用户没有激活
        $data['user_status']=0;
        $data['token']=str_random(50);
        $data['user_phone']='13636364361';
        $data['user_password']=Hash::make($data['user_password']);
        //var_dump($data);exit;
        $request->flash();
        if($fcode==$vcode){ 
        	//数据插入
        	if($id=DB::table('user')->insertGetid($data)){ 
        		$this->sendMail($data['email'],$id,$data['token']);
        		//echo "激活用户邮箱已经发送,请登录邮箱查看用户激活用户";
        		return redirect('/logins/create')->with('success','激活用户邮箱已经发送,请登录邮箱查看用户激活用户');
        	}
        }else{ 
				return redirect("/registers")->with('error','校验码有误,请重新输入');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //验证邮箱
    public function doemail(Request $request)
    { 
    	//获取email
    	$email=$request->only(['email']);
    	//dd($email);
    	//return $email;
    	$data=DB::table('user')->where('email','=',$email)->first();
    	if($data){ 
    		echo 1;
    	}else{ 
    		echo 2;
    	}
    }
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
        //获取输入校验码
      
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
