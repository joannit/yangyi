<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\HomeUserInsert;
use Hash;
class HomeRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
       return view("Home.Register.register");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       	// fun();

    	$data=$request->except(['_token','smscode']);

    	//var_dump($data);exit;

    	$login=DB::table('user')->insert($data);

    	if($login){ 

    		return redirect("/homelogin")->with('success','注册成功,请登录');
    	}else{ 

    		return back()->with('error','注册失败,请认真检查');
    	}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
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
        

    }


    public function regits(Request $request)
    {
        $name=$request->input('user_name');

        //var_dump($name);exit;
        $data=DB::table('user')->where('user_name','=',$name)->first();
    	//echo 1;
		//var_dump($name);exit;
       //return $data;
        if($data){ 
        	echo 1;
        }else{ 
        	echo 2;
        }

    }
    //校验手机号
    public function dophone(Request $request)
    { 
    	$phone=$request->input('user_phone');
    	//var_dump($phone);
    	$data=DB::table('user')->where('user_phone','=',$phone)->first();

    	if($data){ 

    		echo 1;
    	}else{ 
    		echo 2;
    	}
    }

    public function phone(Request $request)
    { 
    	$phone=$request->input('user_phone');
    	
    	sendphone($phone);
		
    }
    //匹配验证码
    public function code(Request $request)
    { 
    	$code=$request->input('code');
    	if(\Cookie::get('param') && !empty($code)){

    		if(\Cookie::get('param')==$code){ 

    			echo 1;//验证码正确
    		}else{ 
    			echo 2;//验证码不匹配
    		}

    	}elseif(empty($code)){ 
    		echo 3;//验证码为空
    	}else{ 
    		echo 4;//验证码过期
    	}
    }
    //操作登录

    public function doregister(Request $request)
    { 

    	$data=$request->except(['_token','smscode']);

    	$data['user_password']=Hash::make($data['user_password']);

    	$data['email']='';
    	$data['token']=str_random(50);
    	//var_dump($data);exit;

    	$login=DB::table('user')->insert($data);

    	if($login){ 

    		return redirect("/homelogin")->with('success','注册成功,请登录');
    	}else{ 

    		return back()->with('error','注册失败,请认真检查');
    	}
    }

}
